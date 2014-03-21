<?php

class ShopController extends \BaseController {

	public function shop(){

		$id = Input::get('category_id');

		if(Category::find($id)!=null){
			return View::make('pages.shop.main')->with('cat_id',$id);
		}

		return View::make('pages.shop.main');

	}

	public function addtocart(){
		
		try {

			$order_list_input = json_decode(Input::get('order_list'));

			if (!Order::where('user_id','=',Auth::user()->id)
				->where('status','=',0)->get()->first()){
				$order = new Order;
				$order->status = 0;
				$order->user_id = $order_list_input->user_id;
				$order->save();

				$order_list = new OrderList;
				$order_list->amount = $order_list_input->amount;
				$order_list->order_id = $order->id;
				$order_list->product_id = $order_list_input->product_id;
				$order_list->total_cost = Prod::find($order_list_input->product_id)->price * $order_list_input->amount;
				$order_list->save();

				echo "no fuck";

			//no order in the list share same product
			} else if(!Order::where('user_id','=',Auth::user()->id)
				->where('status','=',0)
				->wherehas('order_list',function($q){
					$q->where('product_id','=',json_decode(Input::get('order_list'))->product_id);
				})->get()->first())

			{
				$order = Order::where('status','=',0)
							->where('user_id','=',Auth::user()->id)->get()->first(); //use
				echo 'fuckk';

				$order_list = new OrderList;
				$order_list->amount = $order_list_input->amount;
				$order_list->order_id = $order->id;
				$order_list->product_id = $order_list_input->product_id;
				$order_list->total_cost = Prod::find($order_list_input->product_id)->price * $order_list_input->amount;
				$order_list->save();

			}else{

				echo "fuck 2";

				$order = Order::where('status','=',0)
							->where('user_id','=',Auth::user()->id)->get()->first();

				$order_list = OrderList::where('product_id','=',$order_list_input->product_id)
										->where('order_id','=',$order->id)->get()->first();
				$order_list->amount = $order_list_input->amount+$order_list->amount;
				$order_list->order_id = $order->id;
				$order_list->product_id = $order_list_input->product_id;
				$order_list->total_cost = Prod::find($order_list_input->product_id)->price * $order_list->amount;
				$order_list->save();

			}

		} catch (Exception $e) {
			echo $e->getMessage();
		}

	}


	public function attributes(){
		Attribute::unguard();
		$id = Input::get('product_id');
		$product = Prod::find($id);
		$temp = Attribute::where('product_id', '=', $id)
		->get()
		->toJson();

		$temp = json_decode($temp);
		$atts = array();
		foreach ($temp as $value) {
			$index = count($atts);
			for ($i=0; $i <count($atts) ; $i++) { 
				if($value->type == $atts[$i]['name']) {
					$index = $i;
					break;
				}
			}

			if($index == count($atts)) $atts[] = array('name' => $value->type, 'data' => array( $value->name) );
			else $atts[$index]['data'][] = $value->name;

		}

		return json_encode($atts);
	}

}