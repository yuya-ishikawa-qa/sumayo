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

// TOP(客側)
Route::get('/', 'CustomerItemsController@index')->name('top');
// 商品詳細(客側)
Route::get('/detail/{id}', 'CustomerItemsController@showDetail')->name('detail');
// 店舗情報(客側)
Route::get('/shopinfo', 'CustomerItemsController@showShopinfo');

// カート関連処理
Route::resource('cart', 'OrderItmesController',['only' => ['index','store','update','destroy']]);

// 顧客入力情報処理
Route::get('/customerinfo/create', 'CustomerInfoController@create')->name('customerinfo.create');
Route::post('/buy/show', 'BuyController@show')->name('buy.show');
Route::post('/buy/store', 'BuyController@store')->name('buy.store');


Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function(){

    // 店舗関係処理

    // TOP画面表示
    Route::get('/stores', 'StoresController@index')->name('store.top');

    // 各詳細画面表示
    Route::get('/stores/holiday', 'StoresController@showStoreHoliday');
    Route::get('/stores/{id}/time', 'StoresController@showStoreTime')->name('storeTime.show');
    Route::get('/stores/{id}/info', 'StoresController@showStoreInfo')->name('storeInfo.show');

    // 各編集画面表示
    Route::get('/stores/{id}/edit/time', 'StoresController@editTime')->name('storeTime.edit');
    Route::get('/stores/{id}/edit/info', 'StoresController@editStoreInfo')->name('storeInfo.edit');
    Route::get('/stores/edit/holiday', 'StoresController@editHoliday');
    Route::get('/stores/edit/category', 'StoresController@editCategory');
    Route::get('/stores/{id}/edit/logo', 'StoresController@editStoreLogo')->name('storeLogo.edit');
    Route::get('/stores/{id}/edit/images', 'StoresController@editStoreImages')->name('storeImages.edit');

    // 店舗情報更新処理
    Route::put('/stores/{id}/time', 'StoresController@updateStoreTime')->name('storeTime.update');
    Route::put('/stores/{id}/info', 'StoresController@updateStoreInfo')->name('storeInfo.update');

    // 店舗画像更新処理
    Route::post('stores/{id}/logo', 'StoresController@uploadStoreLogo')->name('storeLogo.upload');
    Route::post('stores/{id}/images', 'StoresController@uploadStoreImages')->name('storeImages.upload');

    // ユーザー関係処理

    // 一覧表示
    Route::get('/users', 'UsersController@index')->name('users.top');

    // 新規ユーザー登録
    Route::get('/users/create', 'UsersController@create')->name('users.create');
    Route::post('/users', 'UsersController@store')->name('users.store');

    // 編集画面表示
    Route::get('/users/{id}/edit', 'UsersController@edit')->name('users.edit');;
    Route::put('/users/{id}/update', 'UsersController@update')->name('users.update');

    // 商品一覧(店舗側)
    Route::get('/items', 'ItemsController@index');
    // Route::post('/items', 'ItemsController@create');

    // 商品詳細(店舗側)
    Route::get('/items/detail/{id}', 'ItemsController@showItemsDetail');

    // 商品編集(店舗側)
    Route::get('/items/edit/{id}', 'ItemsController@edit');
    Route::post('/items/update/{id}', 'ItemsController@update');

    // 商品情報削除(店舗側)
    Route::post('/items/destroy/{id}', 'ItemsController@destroy');

    // 商品登録(店舗側)
    Route::get('/items/register', 'ItemsController@create');
    Route::post('/items/store', 'ItemsController@store');

    // ユーザー名更新
    Route::put('/users/{id}/name', 'UsersController@updateUserName')->name('users.updateName');

    // ユーザーパスワード更新
    Route::put('/users/{id}/password', 'UsersController@updateUserPassword')->name('users.updatePassword');

    // メールアドレス変更用メール送信
    Route::put('/users/{id}/password', 'UsersController@updateUserPassword')->name('users.updatePassword');

    // メールアドレス変更確認メール処理
    Route::post('/email/{id}', 'ChangeEmailController@sendChangeEmailLink')->name('email.update');

    // 新規メールアドレスに更新
    Route::get("reset/{token}", "ChangeEmailController@reset");

    // メール変更確認画面表示
    Route::post('/email/message', 'ChangeEmailController@showMessage');

    // ユーザー削除
    Route::delete('/users/{id}', 'UsersController@destroy')->name('users.destory');

    // 注文管理関係処理
    Route::resource('orders', 'OrdersController',['only' => ['index','show','edit','update']]);

});
