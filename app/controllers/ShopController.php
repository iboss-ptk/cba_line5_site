<?php

class ShopController extends \BaseController {

	public function getIndex(){

		$id = Input::get('category_id');

		if(Category::find($id)!=null){
			return View::make('pages.shop.main')->with('cat_id',$id);
		}

		return View::make('pages.shop.main');

	}

}