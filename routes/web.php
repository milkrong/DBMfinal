<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('products/{category}', 'ProductsController@getIndex');
Route::get('product_detail/{id}', 'ProductsController@getDetail');

Auth::routes();

Route::get('/cart', 'CartController@showCart');
Route::get('/cart/add/{id}/{quantity}/{size}', 'CartController@addItem');
Route::get('/cart/remove/{id}', 'CartController@removeItem');
