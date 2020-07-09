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

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/store', 'StoreController@index')->name('store.top');
Route::get('/store/edit_time', 'StoreController@edit_time');
Route::get('/store/edit_holiday', 'StoreController@edit_holiday');
Route::get('/store/edit_category', 'StoreController@edit_category');
Route::get('/store/edit_store_info', 'StoreController@edit_store_info');
Route::get('/store/edit_store_image', 'StoreController@edit_store_image');


Route::get('/users', 'UsersController@index');
Route::get('/users/1/edit', 'UsersController@edit');


