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

//Home and products
Route::get('/', 'HomeController@index')->name('index');
Route::get('products/{category}', 'ProductsController@getIndex');
Route::get('product_detail/{id}', 'ProductsController@getDetail');
Route::post('search', 'ProductsController@search');

//Stores and about
Route::get('store','StoreController@getIndex');
Route::get('about','HomeController@about');

//User check
Auth::routes();

//Cart
Route::get('cart', 'CartController@showCart');
Route::get('cart/add/{id}/{quantity}/{size}', 'CartController@addItem');
Route::get('cart/remove/{id}', 'CartController@removeItem');

//Order
Route::get('order', 'CheckoutController@create');
Route::get('order/{step}', 'CheckoutController@show');
Route::post('bill/update', 'CheckoutController@update_bill');
Route::post('store/update', 'CheckoutController@update_store');
Route::post('payment/update', 'CheckoutController@update_payment');
Route::post('place', 'CheckoutController@place');

//Admin
Route::get('admin/index', 'AdminController@index');
Route::get('admin/customers', 'AdminController@customers');
Route::get('admin/order', 'AdminController@order');
Route::get('admin/diversity', 'AdminController@diversity');
Route::get('admin/top_store', 'AdminController@topStore');
Route::get('admin/awards', 'AdminController@awards');