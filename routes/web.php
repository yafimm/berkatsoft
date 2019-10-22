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

Route::get('/shop', 'ProductController@shop')->name('product.shop');
Route::get('/shop/{slug}', 'ProductController@shop_show')->name('product.shop.show');
Route::get('/contact', 'HomeController@index')->name('contact');

Route::group(['middleware' => ['web', 'auth']], function(){
});

Route::group(['prefix' => 'admin', 'middleware' => ['web','admin']], function(){
    Route::resource('kategori', 'KategoriController');
    Route::resource('product', 'ProductController');
});




Route::get('/home', 'HomeController@index')->name('home');
