<?php

class DoOrderController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$orders = Order::All();	
		$order_lists = Order_list::All();
		return View::make('pages.order.index',array( 'orders'=> $orders, 'order_list' => $order_lists ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function confirmation($id)
	{
		//
		$order = Order::find($id);  
		return View::make('pages.order.confirmation',array( 'order' =>$order));
	}
	public function updateconfirmation($id)
	{
		//
		$rules = array(
			'image_path'=>'required|image|mimes:jpeg,jpg,bmp,png,gif'
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			return Redirect::to('product/create')
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
			return Redirect::to('page.order.confirmation');
		}
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}