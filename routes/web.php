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
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/cart', 'CartController@index')->name('cart.index');

Route::group(['middleware' => ['web']], function(){
  Route::post('/cart/add', 'CartController@add')->name('cart.add');
  Route::put('/cart/update', 'CartController@update')->name('cart.update');
  Route::delete('/cart/destroy', 'CartController@destroy')->name('cart.destroy');
});

Route::group(['middleware' => ['web','user']], function(){
    Route::get('/dashboard', 'UsersController@admindashboard')->name('user.dashboard');
    Route::get('/dashboard/account', 'UsersController@account')->name('user.account');
    Route::put('/dashboard/account/update', 'UsersController@account_update')->name('user.account.update');
    Route::put('/dashboard/account/password', 'UsersController@password_update')->name('user.password.update');
    Route::get('/dashboard/order', 'OrderController@index_user')->name('order.index_user');
    Route::get('/dashboard/order/{id}', 'OrderController@show')->name('order.show');
    Route::post('/cart/checkout', 'OrderController@store')->name('order.checkout');
});

Route::group(['prefix' => 'admin', 'middleware' => ['web','admin']], function(){
    Route::get('dashboard', 'UsersController@admindashboard')->name('admin.dashboard');
    Route::get('/dashboard/account', 'UsersController@account')->name('admin.account');
    Route::put('/dashboard/account/update', 'UsersController@account_update')->name('admin.account.update');
    Route::put('/dashboard/account/password', 'UsersController@password_update')->name('admin.password.update');
    Route::get('users', 'UsersController@index_admin')->name('user.indexadmin');
    Route::get('order/record', 'OrderController@record')->name('order.record');
    Route::get('order/{id}', 'OrderController@show')->name('order.show');
    Route::get('order/update', 'OrderController@update_status')->name('order.update.status');
    Route::resource('order', 'OrderController');
    Route::resource('product', 'ProductController');
});




Route::get('/home', 'HomeController@index')->name('home');
