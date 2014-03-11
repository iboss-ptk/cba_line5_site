<?php

class ProductController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
	}
	public function index()
	{
		$products = Prod::All();	
		$brand_all = Brand::All();
		$category_all = Category::All();
		return View::make('pages.product.index',array( 'products'=> $products, 'brand_all' => $brand_all, 'category_all' => $category_all ) );
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$brand_all = Brand::All();
		$category_all = Category::All();
		return View::make('pages.product.create',array( 'brand_all' => $brand_all, 'category_all' => $category_all ) );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name'       => 'required',

		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('product/create')
				->withErrors($validator)
				->withInput();
		} else {
			// store
			$product = new prod;
			$product->name          = Input::get('name');
			$product->price         = Input::get('price');
			$product->brand_id      = Input::get('brand');
			$product->category_id   = Input::get('category');
			$image = Input::file('product_pic');
			$filename = date('Y-m-d-H-i-s')."-".$image->getClientOriginalName();
			Image::make($image->getRealPath())->resize(468,249)->save(public_path().'/img/products/'.$filename);

			$product->product_pic = '/img/products/'.$filename;
			$product->save();

			// redirect
			Session::flash('message', 'Successfully created product!');
			return Redirect::to('product');
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = Prod::find($id);

		return View::make('pages.product.show')
			->with('product', $product);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Prod::find($id);

		$brand_all = Brand::All();
		$category_all = Category::All();

		return View::make('pages.product.edit',array( 'product'=> $product, 'brand_all' => $brand_all, 'category_all' => $category_all ) );

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'name'       => 'required',

		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('product/create')
				->withErrors($validator)
				->withInput();
		} else {
			// store
			$product = Prod::find($id);
			$product->name          = Input::get('name');
			$product->price         = Input::get('price');
			$product->brand_id      = Input::get('brand');
			$product->category_id   = Input::get('category');
			File::delete(public_path().$product->image);

			$image = Input::file('product_pic');
			$filename = date('Y-m-d-H-i-s')."-".$image->getClientOriginalName();
			Image::make($image->getRealPath())->resize(468,249)->save(public_path().'/img/products/'.$filename);
			$product->product_pic = '/img/products/'.$filename;
			$product->save();

			// redirect
			Session::flash('message', 'Successfully update product!');
			return Redirect::to('product');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$product = Prod::find($id);
		if ($product) {
			File::delete(public_path().$product->image);
			$product->delete();
			Session::flash('message', 'Successfully deleted the product!');
		return Redirect::to('product');
		}
		

		// redirect
		Session::flash('message', 'Something went wrong, please try again');
		return Redirect::to('product');
	}



	

}