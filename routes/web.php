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

// お客さんカスタマー購入画面

// TOP
Route::get('/', function () {
    return view('index');
});

// 商品詳細
Route::get('/detail', function () {
    return view('detail');
});

// カート情報
Route::get('/cart', function () {
    return view('cart');
});

// 店舗情報
Route::get('/shopinfo', function () {
    return view('shopinfo');
});

// 商品一覧(お店側)
Route::get('/items', function () {
    return view('items');
});

// 商品詳細(お店側)
Route::get('/items/detail', function () {
    return view('item_detail');
});

// 商品編集(お店側)
Route::get('/items/detail/edit', function () {
    return view('item_edit');
});

// 商品登録(お店側)
Route::get('/items/register', function () {
    return view('item_register');
});

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

    // 注文管理関係処理
    Route::resource('orders', 'OrdersController',['only' => ['index','show','update']]);

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
