<?php

class ProductController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::All();
		return View::make('pages.product.index')
			->with('products', $products);
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
			$product = new product;
			$product->name          = Input::get('name');
			$product->price         = Input::get('price');
			$product->brand_id      = Input::get('brand');
			$product->category_id   = Input::get('category');
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
		$products = Product::All();

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