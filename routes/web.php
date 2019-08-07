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

Auth::routes();

// Page
Route::get('/home', 'Page\HomeController@index')->name('home');

// Product
Route::get('/products', 'Product\ProductController@index');
Route::get('/product/show/{id}', 'Product\ProductController@show');

// Cart - index
Route::get('/cart', 'Cart\IndexController@index')->name('cart-index');
Route::post('/cart/save-shipping', 'Cart\IndexController@saveShipping')->middleware('auth');
Route::post('/cart/save-order', 'Cart\IndexController@saveOrder')->middleware('auth');

// Cart - change
Route::post('/cart/add', 'Cart\ChangeController@add');
Route::post('/cart/remove', 'Cart\ChangeController@remove');

// Cart - shipping
Route::get('/cart/shipping', 'Cart\ShippingController@index')->name('cart-ship')->middleware('auth');

// Cart - payment
Route::get('/cart/payment', 'Cart\PaymentController@index')->name('cart-pay')->middleware('auth');

// Region
Route::get('/region/find/country', 'Region\RegionController@findCountry')->middleware('auth');
Route::get('/region/find/state/{country}', 'Region\RegionController@findState')->middleware('auth');
Route::get('/region/find/city/{state}', 'Region\RegionController@findCity')->middleware('auth');
