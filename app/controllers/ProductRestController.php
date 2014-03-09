<?php

class ProductRestController extends \BaseController {

	public function getData($search=null)
	{
		$search = Input::get('search');

		if(!$search){
			$products = Prod::paginate($limit = 10)->toJson();
			return $products;
		}else{
			$products = Prod::where('name', 'LIKE', '%'.$search.'%')
                        ->paginate(10)
                        ->toJson();
			return $products;
		}
		
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