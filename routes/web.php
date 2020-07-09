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
Route::get('/order_form', function () {
    return view('order_form');
});
Route::get('/order_confirmation', function () {
    return view('order_confirmation');
});
Route::get('/order_confirm', function () {
    return view('order_confirm');
});
