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


Route::get('/', 'UserController@index');
Route::post('/user/login', 'UserController@login');
Route::get('/logout', 'UserController@logout');

Route::get('/orders', 'OrderController@index');
Route::get('/order/{id}', 'OrderController@show');
Route::get('/orders/create', 'OrderController@showCreateForm');
Route::post('/orders/save', 'OrderController@saveOrder');
Route::get('/orders/update/{id}', 'OrderController@showUpdateForm');
Route::post('/orders/delete/{id}', 'OrderController@delete');
