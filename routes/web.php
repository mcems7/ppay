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
URL::forceScheme('https');

Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/order', 'HomeController@order')->name('order');
Route::get('/response/{id}', 'HomeController@response')->name('response');
Route::post('/order', 'HomeController@order')->name('order');
Route::post('/pagar', 'HomeController@pagar')->name('pagar');

Route::resource('products', 'ProductsController');
Route::resource('visitas', 'VisitasController');

Route::get('/generaqr/{id}', 'VisitasController@generaqr')->name('generaqr');
Route::group(['prefix' => 'admin', 'as'=>'admin.'], function () {
    Route::resource('orders', 'OrdersController');
    Route::resource('products', 'ProductsController');
});