<?php

class CheckOrderController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
    {
        $this->beforeFilter(function()
        {
            
            if (Auth::guest()) return Redirect::to('user/login');
        });
    }
    public function getStatus5No()
	{
		
		$orders = Order::where('status','=',5)->get(); 
		$spbanneds = User::where('banned','=',1)->where('issp','=',1)->get();
		$users = User::All();
		 return View::make('checkOrder.status5no',array( 'orders' =>$orders,  'spbanneds'=> $spbanneds,'users' =>$users));
	}
	  public function getStatus5Yes()
	{
		
		$orders = Order::where('status','=',5)->get(); 
		$spnotbanneds = User::where('banned','=',0)->where('issp','=',1)->get();
		$users = User::All();
		 return View::make('checkOrder.status5yes',array( 'orders' =>$orders,  'spnotbanneds'=> $spbanneds,'users' =>$users));
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

}