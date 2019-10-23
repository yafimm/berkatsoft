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

Auth::routes();

Route::get('/shop', 'ProductController@shop')->name('product.shop');
Route::get('/shop/{slug}', 'ProductController@shop_show')->name('product.shop.show');
Route::get('/contact', 'HomeController@index')->name('contact');
Route::get('/cart', 'CartController@index')->name('cart.index');

Route::group(['middleware' => ['web']], function(){
  Route::post('/cart/add', 'CartController@add')->name('cart.add');
  Route::put('/cart/update', 'CartController@update')->name('cart.update');
  Route::delete('/cart/destroy', 'CartController@destroy')->name('cart.destroy');
});

Route::group(['middleware' => ['web','user']], function(){
    Route::get('dashboard', 'UsersController@admindashboard')->name('user.dashboard');
    Route::post('/cart/checkout', 'OrderController@store')->name('order.store');
});

Route::group(['prefix' => 'admin', 'middleware' => ['web','admin']], function(){
    Route::get('dashboard', 'UsersController@admindashboard')->name('admin.dashboard');
    Route::resource('kategori', 'KategoriController');
    Route::resource('product', 'ProductController');
});




Route::get('/home', 'HomeController@index')->name('home');
