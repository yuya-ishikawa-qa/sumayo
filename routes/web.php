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

use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;


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

Auth::routes();

// Route::get('/login', 'Auth\LoginController@loginForm')->name('login');
// Route::post('/login', 'Auth\LoginController@login')->name('login.post');
// Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('signup');
// Route::post('register', 'Auth\RegisterController@register')->name('signup.post');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function(){
    
    // 店舗関係処理

    // TOP画面表示
    Route::get('/stores', 'StoresController@index')->name('store.top');

    // 各詳細画面表示
    Route::get('/stores/holiday', 'StoresController@showStoreHoliday');
    Route::get('/stores/time', 'StoresController@showStoreTime');
    Route::get('/stores/{id}/info', 'StoresController@showStoreInfo');

    // 各編集画面表示
    Route::get('/stores/edit/time', 'StoresController@editTime');
    Route::get('/stores/edit/holiday', 'StoresController@editHoliday');
    Route::get('/stores/edit/category', 'StoresController@editCategory');
    Route::get('/stores/{id}/edit/info', 'StoresController@editStoreInfo');
    Route::get('/stores/edit/logo', 'StoresController@editStoreLogo');
    Route::get('/stores/edit/images', 'StoresController@editStoreImages');

    // 店舗情報更新処理
    Route::put('/stores/{id}', 'StoresController@updateStoreInfos')->name('storeInfos.update');

    // ユーザー関係処理

    // 一覧表示
    Route::get('/users', 'UsersController@index')->name('users.top');
    
    // 新規ユーザー登録
    Route::post('users', 'UsersController@store')->name('users.store');
    Route::get('/users/create', 'UsersController@create')->name('users.create');
    
    // 編集画面表示
    Route::get('/users/{id}/edit', 'UsersController@edit')->name('users.edit');;

    // ユーザー名更新
    Route::put('/users/{id}/name', 'UsersController@updateUserName')->name('users.updateName');

    // ユーザーパスワード更新
    Route::put('/users/{id}/password', 'UsersController@updateUserPassword')->name('users.updatePassword');
    
    // メールアドレス変更用メール送信
    Route::post('/email/{id}', 'ChangeEmailController@sendChangeEmailLink')->name('email.update');

    // 新規メールアドレスに更新
    Route::get("reset/{token}", "ChangeEmailController@reset");

    // メール変更確認画面表示
    Route::post('/email/message', 'ChangeEmailController@showMessage');
    
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
