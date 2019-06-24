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
Route::post('/cart/add', 'Cart\ChangeController@add');

// Cart - shipping
Route::get('/cart/shipping', 'Cart\ShippingController@index');

// Region
Route::get('/region/find/country', 'Region\RegionController@findCountry');
Route::get('/region/find/state/{country}', 'Region\RegionController@findState');
Route::get('/region/find/city/{state}', 'Region\RegionController@findCity');
