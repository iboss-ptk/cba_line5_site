<?php

class CheckOrderController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */


    public function getStatus5No()
	{
	
		$orders = Order::where('status','=',5)->get(); 
		$spbanneds = User::where('banned','=',1)->where('issp','=',1)->get();
		$users = User::All();
		$ordersNo = array();
		foreach($orders as $order){
			foreach($users as $user){
				if($order -> user_id == $user -> id){

					if($user->resp_sp_code == '0')
					{$ordersNo[] = $order;}
					else{
						foreach($spbanneds as $spbanned)
						{
							if($user->resp_sp_code == $spbanned->sp_code)
							{
								$ordersNo[] = $order;
							}
						}
					}

				}
			}
		}
		 return View::make('checkOrder.status5no',array( 'ordersNo' =>$ordersNo));
	}
	  public function getStatus5Yes()
	{
		$ordersYes = array();
		$orders = Order::where('status','=',5)->get(); 
		$spnotbanneds = User::where('banned','=',0)->where('issp','=',1)->get();
		$users = User::All();
		foreach($orders as $order){
			foreach($users as $user){
				if($order -> user_id == $user -> id){

					if($user->resp_sp_code != '0')
					{
						foreach($spnotbanneds as $spnotbanned)
						{
							if($user->resp_sp_code == $spnotbanned->sp_code)
							{
								$ordersYes[] = $order;
							}
						}
					}
				}
			}
		}
		 return View::make('checkOrder.status5yes',array( 'ordersYes' =>$ordersYes));
	}
	public function getShowOrderlist($id)
	{
		$orderlists = OrderList::where('order_id',$id)->get(); 
		$products = Prod::All();	
		$brand_all = Brand::All();
		$category_all = Category::All();
		$order= Order::find($id);
		 return View::make('checkOrder.showorderlist',array( 'order' =>$order,  'products'=> $products,'orderlists' =>$orderlists, 'brand_all' => $brand_all, 'category_all' => $category_all ));
	}


	public function getAllCheckConfirm(){

		//$orders = Order::where('status','=',4)->orderBy('id', 'DESC')->get();

		$orders = Order::where('status','=',4)->get();


		//return 'eiei';
		return View::make('CheckOrder.AllCheckConfirm',array('orders'=> $orders));
	}

	public function getCheckConfirm($orderId){

		$order = Order::find($orderId);

		$user = User::find($order->user_id);

		return View::make('CheckOrder.checkConfirm',array('order'=> $order,'user'=>$user));
	}

	public function postCheckConfirm($orderId){

		$order = Order::find($orderId);
		$order->status = 5;
		$order->save();

		return Redirect::to('checkorder/all-check-confirm');
		
	}

}