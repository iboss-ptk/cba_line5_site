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

		$order_list_input = json_decode(Input::get('order_list'));
		$order_list = new OrderList;
		$order_list->order_id =0;
		$order_list->product_id = $order_list_input->product_id;
		$order_list->amount = $order_list_input->amount;
		$order_list->total_cost = Prod::find($order_list_input->product_id)->price * $order_list_input->amount;
		$order_list->save();

		var_dump($order_list);

		// return Response::json($order_list_input);

		// $order_list->order_list_attribute()->save($order_list_input->attribute);

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