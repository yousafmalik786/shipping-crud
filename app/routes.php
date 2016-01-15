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

/*Route::get('/', function()
{
	return View::make('hello');
});*/


//Route::get('/orders', 'OrderController@index');
Route::get('/', 'UserController@index');
Route::post('/user/login', 'UserController@login');

Route::get('/orders', 'OrderController@index');
Route::get('/order/{id}', 'OrderController@show');
Route::get('/order/123', 'OrderController@showCreateForm');
