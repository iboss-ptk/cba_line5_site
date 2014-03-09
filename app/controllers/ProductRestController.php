<?php

class ProductRestController extends \BaseController {

	public function getData()
	{
		$products = Prod::paginate($limit = 10)->toJson();
		return $products;
	}

	public function getBrand()
	{
		$brands = Brand::All()->toJson();
		return $brands;

	}

	public function getCategory()
	{
		$categories = category::All()->toJson();
		return $categories;
	}

}