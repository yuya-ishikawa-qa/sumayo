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
Route::get('/order_form', function () {
    return view('order_form');
});
Route::get('/order_confirmation', function () {
    return view('order_confirmation');
});
Route::get('/order_confirm', function () {
    return view('order_confirm');
});
Route::get('/order_list', function () {
    return view('order_list');
});
Route::get('/order_detail', function () {
    return view('order_detail');
});
Route::get('/order_edit', function () {
    return view('order_edit');
});

// TOP(客側)
Route::get('/', 'CustomerItemsController@index');
// 商品詳細(客側)
Route::get('/detail', 'CustomerItemsController@showDetail');
// // 商品詳細(客側)
// Route::get('/detail/{id}', 'CustomerItemsController@showDetail');
// カート情報(客側)
Route::get('/cart', 'CustomerItemsController@showCart');
// 店舗情報(客側)
Route::get('/shopinfo', 'CustomerItemsController@showShopinfo');


Auth::routes();

// Route::get('/login', 'Auth\LoginController@loginForm')->name('login');
// Route::post('/login', 'Auth\LoginController@login')->name('login.post');
// Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('signup');
// Route::post('register', 'Auth\RegisterController@register')->name('signup.post');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function(){
    
    // 店舗関係処理
    // TOP画面表示
    Route::get('/store', 'StoreController@index')->name('store.top');

    // 各詳細画面表示
    Route::get('/store/holiday', 'StoreController@showStoreHoliday');
    Route::get('/store/time', 'StoreController@showStoreTime');
    Route::get('/store/info', 'StoreController@showStoreInfo');

    // 各編集画面表示
    Route::get('/store/edit/time', 'StoreController@editTime');
    Route::get('/store/edit/holiday', 'StoreController@editHoliday');
    Route::get('/store/edit/category', 'StoreController@editCategory');
    Route::get('/store/edit/info', 'StoreController@editStoreInfo');
    Route::get('/store/edit/logo', 'StoreController@editStoreLogo');
    Route::get('/store/edit/images', 'StoreController@editStoreImages');

    // ユーザー関係処理
    Route::get('/users', 'UsersController@index')->name('users.top');
    Route::get('/users/create', 'UsersController@create')->name('users.create');
    Route::post('users', 'UsersController@store')->name('users.store');
    Route::get('/users/{id}/edit', 'UsersController@edit')->name('users.edit');;
    Route::put('/users/{id}/update', 'UsersController@update')->name('users.update');

    // 商品一覧(店舗側)
    Route::get('/items', 'ItemsController@index');
    // Route::post('/items', 'ItemsController@create');

    // 商品詳細(店舗側)
    Route::get('/items/detail/', 'ItemsController@showItemsDetail');

    // 商品編集(店舗側)
    Route::post('/items/detail/edit', 'ItemsController@editItemsDetail');

    // // 商品詳細(店舗側)
    // Route::get('/items/detail/{id}', 'ItemsController@showItemsDetail');
    
    // // 商品編集(店舗側)
    // Route::post('/items/detail/{id}/edit', 'ItemsController@editItemsDetail');

    // 商品登録(店舗側)
    Route::get('/items/register', 'ItemsController@store');
    Route::post('/items', 'ItemsController@create');
    
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
