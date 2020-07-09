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

// 店舗情報
Route::get('/items', function () {
    return view('items');
});


