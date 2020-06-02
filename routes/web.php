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

// Auth::routes();

Route::namespace('Web')->name('web.')->group(function() {
	Route::get('/', 'PageController@index')->name('index');
	Route::get('/products', 'ProductController@index')->name('products.index');
	Route::get('/products/{id}', 'ProductController@show')->name('products.show');
	Route::get('/shopping-cart', 'CartController@index')->name('cart.index');
	Route::get('/checkout', 'CartController@checkout')->name('cart.checkout');

	Route::namespace('API')->prefix('api')->group(function() {
		Route::post('v1/cart_item/{id}', 'CartItemController@store')->name('cart_items.store');
		Route::post('v1/cart_item/{id}/update', 'CartItemController@update')->name('cart_items.update');
		Route::delete('v1/cart_item/{id}', 'CartItemController@destroy')->name('cart_items.destroy');

		Route::get('v1/cart', 'CartController@index')->name('cart.index');
	});
});
