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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'products'],function(){
	Route::get('/','ProductsController@index')->name('products.list');
	Route::get('/single','ProductsController@single')->name('products.single');
	Route::post('/store','ProductsController@store')->name('products.store');
	Route::post('/update','ProductsController@update')->name('products.update');
	Route::get('/destroy','ProductsController@destroy')->name('products.destroy');
});
Route::group(['prefix'=>'users'],function(){
	Route::get('/','UsersController@index')->name('users.list');
	Route::get('/single','UsersController@get_single')->name('users.single');
	Route::post('/login','UsersController@login')->name('users.login');

});

Route::group(['prefix'=>'order'],function(){
	Route::get('/','OrdersController@get_orders')->name('order.list');
	Route::get('/order_single','OrdersController@order_single')->name('order.single');
	Route::get('/ship','OrdersController@get_ship')->name('order.ship');
	Route::get('/user_ship','OrdersController@get_user_ship')->name('order.user_ship');
	Route::get('/detail_order','OrdersController@detail_order')->name('order.detail');
	Route::post('/store_order','OrdersController@store_order')->name('order.store_order');
	Route::post('/store_detail','OrdersController@store_detail')->name('order.store_detail');
	Route::post('/update_order','OrdersController@update_order')->name('order.update_order');
	Route::post('/update_ship','OrdersController@update_ship')->name('order.update_ship');
});
