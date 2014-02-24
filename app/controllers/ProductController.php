<?php

class ProductController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Prod::All();	
		$brand_all = Brand::All();
		$category_all = Category::All();
		return View::make('pages.product.index',array( 'products'=> $products, 'brand_all' => $brand_all, 'category_all' => $category_all ) );
	}

	public function getIndex($brand, $category=null )
	{
		$products = Prod::All();	
		$brand_all = Brand::All();
		$category_all = Category::All();
		var_dump($brand);
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
		$nerd = Prod::find($id);
		$nerd->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the product!');
		return Redirect::to('product');
	}



	

}