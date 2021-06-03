<?php

use Illuminate\Support\Facades\Route;

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

//PRODUCTS
Route::get('/products', 'App\Http\Controllers\ProductsController@products');
Route::get('/products/{id}/edit', 'App\Http\Controllers\ProductsController@editproduct');
Route::put('/products/{id}', 'App\Http\Controllers\ProductsController@updateproduct');
Route::get('/products/{id}/delete', 'App\Http\Controllers\ProductsController@deleteproduct');
Route::get('/products/add', 'App\Http\Controllers\ProductsController@add');
Route::post('/products', 'App\Http\Controllers\ProductsController@storeproducts');

//SPECIAL_PRICE
Route::get('/special-price', 'App\Http\Controllers\SpecialPriceController@specialprice');
Route::get('/special-price/{id}/edit', 'App\Http\Controllers\SpecialPriceController@editspecialprice');
Route::put('/special-price/{id}', 'App\Http\Controllers\SpecialPriceController@updatespecialprice');
Route::get('/special-price/{id}/delete', 'App\Http\Controllers\SpecialPriceController@deletespecialprice');
Route::get('/special-price/add', 'App\Http\Controllers\SpecialPriceController@add');
Route::post('/special-price', 'App\Http\Controllers\SpecialPriceController@storespecialprice');
Route::post('/special-price/info-company', 'App\Http\Controllers\SpecialPriceController@infocompany');

//SERVICES
Route::get('/services', 'App\Http\Controllers\ServicesController@services');
Route::get('/services/{id}/edit', 'App\Http\Controllers\ServicesController@editservices');
Route::put('/services/{id}', 'App\Http\Controllers\ServicesController@updateservices');
Route::get('/services/{id}/delete', 'App\Http\Controllers\ServicesController@deleteservices');

Route::get('/services/add', 'App\Http\Controllers\ServicesController@add');
Route::post('/services', 'App\Http\Controllers\ServicesController@storeservices');

//RESERVATION
Route::get('/services/{id}/reservation', 'App\Http\Controllers\ReservationController@reservation');
Route::post('/reservations', 'App\Http\Controllers\ReservationController@storereservations');
Route::get('/reservation', 'App\Http\Controllers\ReservationController@reservations');
Route::post('/reservations/info', 'App\Http\Controllers\ReservationController@inforeservation');
Route::get('/reservation/{id}/delete', 'App\Http\Controllers\ReservationController@reservationdelete');