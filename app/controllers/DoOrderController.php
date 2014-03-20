<?php

class DoOrderController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter(function()
        {
            //
            if (Auth::guest()) return Redirect::to('user/login');
        });
    }
    public function getIndex()
	{
		$userId = Auth::user()->id;
		$orders = Order::where('user_id',$userId)->get();
		return View::make('userOrder.index',array( 'orders'=> $orders));
	}

	//public function getAdminProfile() {}
	public function getShowOrderlist($id)
	{
		//
		$orderlists = OrderList::where('order_id',$id)->get(); 
		$products = Prod::All();	
		$brand_all = Brand::All();
		$category_all = Category::All();
		 return View::make('userOrder.showorderlist',array(  'products'=> $products,'orderlists' =>$orderlists, 'brand_all' => $brand_all, 'category_all' => $category_all ));
	}
	public function postShowOrderlist($id) {

		//$address = Auth::user()->address;
		//return View::make('try.confirmAd')->with('address',$address);

		//redirect to page that show status of order
		return Redirect::to('doorder/show-orderlist/'.$id);

	}

	public function getUserAddress() {

		$address = Auth::user()->address;
		return View::make('userOrder.confirmAd')->with('address',$address);

	}

	public function postUserAddress() {

		//$address = Auth::user()->address;
		//return View::make('try.confirmAd')->with('address',$address);

		//redirect to page that show status of order
		return Redirect::to('doorder');

	}

	public function getEditUserAddress() {

		$address = Auth::user()->address;
		//return View::make('try.confirmAd')->with('address',$address);
		return View::make('userOrder.editAd')->with('address',$address);
	}
	public function postEditUserAddress() {

		//$address = Auth::user()->address;
		//return View::make('try.confirmAd')->with('address',$address);
		
		$validator = Validator::make(
		    array('address' => Input::get('address')),
		    array('address' => 'required')
		);

		if ($validator->fails())
		{
		    // The given data did not pass validation
			Redirect::to('doorder/edit-user-address')
			->withErrors($validator)
            ->withInput();
		}else{
			//store
			$user = Auth::user();
			$user->address = Input::get('address');
			$user->updateUniques();

		}

		// redirect
        Session::flash('message', 'Successfully update address!');
        return Redirect::to('doorder/user-address');
	}

	////////////////////////////////Peerapat zone/////////////////////////
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getConfirmation($id)
	{
		//
		$order = Order::find($id);  
		 return View::make('userOrder.confirmation',array( 'order' =>$order));
	}
	public function postConfirmation($id)
	{
		//
		$rules = array(
			'image_path'=>'required|image|mimes:jpeg,jpg,bmp,png,gif'
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			return Redirect::to('doorder/confirmation/'.$id)
			->withErrors($validator)
			->withInput();
		} else {
		$order=Order::find($id);
		if(Input::hasFile('image_path')){

				$image = Input::file('image_path');
				$filename = date('Y-m-d-H-i-s')."-".$image->getClientOriginalName();
				Image::make($image->getRealPath())->save(public_path().'/img/orders/'.$filename);
				$order->image_path = 'img/orders/'.$filename;

			}else if (Input::has('image_path')) {
				$order->image_path = Input::get('image_path');
			}
			$order->confirmed = 1;
			$order->status = 3; 
			$order->save();
			Session::flash('message', 'Successfully confirmation!');
			
		return Redirect::to('doorder');
		}

	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

}