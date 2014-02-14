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

Route::get('/', function()
{
	return View::make('pages.home');
});// Confide routes
Route::get( 'user/create',                 'UserController@create');
Route::post('user',                        'UserController@store');
Route::get( 'user/login',                  'UserController@login');
Route::post('user/login',                  'UserController@do_login');
Route::get( 'user/confirm/{code}',         'UserController@confirm');
Route::get( 'user/forgot_password',        'UserController@forgot_password');
Route::post('user/forgot_password',        'UserController@do_forgot_password');
Route::get( 'user/reset_password/{token}', 'UserController@reset_password');
Route::post('user/reset_password',         'UserController@do_reset_password');
Route::get( 'user/logout',                 'UserController@logout');


// Confide routes
Route::get( 'admin/create',                 'AdminController@create');
Route::post('admin',                        'AdminController@store');
Route::get( 'admin/login',                  'AdminController@login');
Route::post('admin/login',                  'AdminController@do_login');
Route::get( 'admin/confirm/{code}',         'AdminController@confirm');
Route::get( 'admin/forgot_password',        'AdminController@forgot_password');
Route::post('admin/forgot_password',        'AdminController@do_forgot_password');
Route::get( 'admin/reset_password/{token}', 'AdminController@reset_password');
Route::post('admin/reset_password',         'AdminController@do_reset_password');
Route::get( 'admin/logout',                 'AdminController@logout');

Route::get('userdata',function(){
	return View::make('pages.userData')->with('username',Auth::user()->username);
});