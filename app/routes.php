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

		$sp_value = Input::get('sp',0);
		if($sp_value>0){
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

});

///end cos is coming to town.



Route::controller('productrest', 'ProductRestController');
Route::resource('product', 'ProductController');
Route::get( 'product/toggle/{id}' ,function ($id)
	{
		$product = Prod::find($id);
		$product->availability = !$product->availability;
		$product->save();
		return Redirect::to('product#'.$id);
	});


Route::get('userdata',function(){
	$name = Confide::user()->username;
	$email = Confide::user()->email;
	return View::make('pages.userData')->with('username',$name);
});
