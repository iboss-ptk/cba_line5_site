<?php

class ProductRestController extends \BaseController {

	public function getData($search=null,$cat=null,$brand=null)
	{
		$search = Input::get('search');




		if (Input::has('category_id')) {
			$cat_id = Input::get('category_id');
			if(!$search){
				$products = Prod::where('category_id','=',$cat_id)
					->paginate($limit = 15)
					->toJson();
					return $products;
				}else{
					$products = Prod::where('name', 'LIKE', '%'.$search.'%')
					->where('category_id','=',$cat_id)
					->paginate(15)
					->toJson();
					return $products;
				}
			} else{

				if(!$search){
					$products = Prod::paginate($limit = 15)->toJson();
					return $products;
				}else{
					$products = Prod::where('name', 'LIKE', '%'.$search.'%')
					->paginate(15)
					->toJson();
					return $products;
				}
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