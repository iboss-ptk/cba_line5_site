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

		OrderList::unguard();

		try {

			$order_list_input = json_decode(Input::get('order_list'));

			// echo 'has order = '. !Auth::user()->order()->get();
			// echo 'has order pending = '. !Auth::user()->order()->where('status','=',0)->get();

			// echo '1: '. (Order::where('user_id','=',Auth::user()->id)->get());
			// echo '2: '. (Order::where('user_id','=',Auth::user()->id)->where('status','=',0)->get());
			

			$order_list = new OrderList;
			if (!Auth::user()->wherehas('order',function($q){
				$q->where('status','=',0);
			})->get()->first()){
				$order = new Order;
				$order->status = 0;
				$order->user_id = $order_list_input->user_id;
				$order->save();
				$order_list->amount = $order_list_input->amount;
				
			} else {
				$order = Order::where('status','=',0)->get()->first();
				$order_list->amount = $order_list_input->amount+$order_list->amount;
				var_dump( $order->id );

			} // has order status 0

			$order_list->order_id = $order->id;
			$order_list->product_id = $order_list_input->product_id;
			$order_list->total_cost = Prod::find($order_list_input->product_id)->price * $order_list_input->amount;
			$order_list->save();

		} catch (Exception $e) {
			echo $e->getMessage();
		}


		// var_dump(Prod::find($order_list_input->product_id)->price * $order_list_input->amount);

		// return Response::json($order_list_input);

		// $order_list->order_list_attribute()->save($order_list_input->attribute);
		// echo $order_list;
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