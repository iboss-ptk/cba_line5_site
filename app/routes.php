<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


// Confide routes


Route::post('user',                        'UserController@store');
//Route::get( 'user/login',                  'UserController@login');
Route::post('user/login',                  'UserController@do_login');

Route::post('user/forgot_password',        'UserController@do_forgot_password');

Route::post('user/reset_password',         'UserController@do_reset_password');




///cos is coming to town
/////////////////TEST COOKIE//////////////////////////
Route::get('testCookie',function(){

	$show_sp_code = Cookie::get('sp_code');


	return 'sp_code = '.$show_sp_code.' ..';
});
////////////////////////////////////////////////////////
/// create cookie if don't set sp , sp_value will be 0 and it will not create cookie.
Route::filter('setcookie',function(){

	$sp_value = Input::get('sp');

	if(!is_null($sp_value)){
		Cookie::queue('sp_code', $sp_value,'forever');
	}

});

///all route that have to set cookie
Route::group(array('before' => 'setcookie'),function()
{

	Route::get('/', function()
	{
		
		return View::make('pages.home');
		
	});
	

	Route::get( 'user/login','UserController@login');
	Route::get( 'user/create',                 'UserController@create');
	Route::get( 'user/confirm/{code}',         'UserController@confirm');
	Route::get( 'user/forgot_password',        'UserController@forgot_password');
	Route::get( 'user/reset_password/{token}', 'UserController@reset_password');
	Route::get( 'user/logout',                 'UserController@logout');

	//shop
	Route::get( 'shop' , 'ShopController@shop');
	


	Route::filter('auth',function(){
		if(!Auth::check()) return Redirect::to('user/login');
	});

	Route::group(array('before' => 'auth'), function(){

		Route::get('shop/cart', 'ShopController@cart');
	});


});

///end cos is coming to town.



Route::controller('productrest', 'ProductRestController');

Route::controller('userrest', 'UserRestController');

Route::get('image/{src}/{w?}/{h?}',function($src,$w=200,$h=200){
	//intervention image cache

	//closure and coping anoymous function
	$cacheimage = Image::cache(function($image) use ($src,$w,$h){
		return $image->make('img/products/'.$src)->resize($w,$h);			
	},10,true);
	return Response::make($cacheimage,200,array('Content-Type'=>'image/jpeg'));
});




Route::filter('auth_admin',function(){
	if(Auth::check()){
		if(!Confide::user()->isadmin) return "You don't have permission";
	} else return Redirect::to('user/login');

});


Route::group(array('before' => 'auth_admin'), function(){

	Route::resource('product', 'ProductController');
	Route::resource('brand', 'BrandController');
	Route::resource('category', 'CategoryController');

	Route::resource('manage_user', 'UserEditController'); //on edit

	Route::get( 'product/toggleavailability/{id}' ,function ($id)
	{
		$product = Prod::find($id);
		$product->availability = !$product->availability;
		$product->save();
		$products = Prod::paginate($limit = 10)->toJson();
		return $products;
	});
	Route::get( 'user/toggleissp/{id}' ,function ($id)
	{
		$user = User::find($id);
		$user->issp = !$user->issp;
		$user->save();
		$users = User::paginate($limit = 10)->toJson();
		return $users;
	});
	Route::get( 'user/togglebanned/{id}' ,function ($id)
	{
		$user = User::find($id);
		$user->banned = !$user->banned;
		$user->save();
		$users = User::paginate($limit = 10)->toJson();
		return $users;
	});
	Route::get( 'user/toggleconfirmed/{id}' ,function ($id)
	{
		$user = User::find($id);
		$user->confirmed = !$user->confirmed;
		$user->save();
		$users = User::paginate($limit = 10)->toJson();
		return $users;
	});
	Route::get( 'user/toggleisadmin/{id}' ,function ($id)
	{
		$user = User::find($id);
		$user->isadmin = !$user->isadmin;
		$user->save();
		$users = User::paginate($limit = 10)->toJson();
		return $users;
	});


});



Route::filter('auth_sp',function(){
	if(Auth::check()){
		if(!Confide::user()->issp) return "You don't have permission";
	} else return Redirect::to('user/login');

});


Route::group(array('before' => 'auth_sp'), function(){

});