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
