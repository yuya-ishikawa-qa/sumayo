<?php

namespace App\Http\Controllers;

use App\Store;
use App\Http\Requests\StoreInfosRequest;
use App\Http\Requests\StoreTimesRequest;
use App\Http\Requests\StoreLogosRequest;
use App\Http\Requests\StoreImagesRequest;


use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 店舗情報取得
        $store = Store::all()->first();

        return view('stores.index', [ 'store' => $store ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showStoreHoliday()
    {
        return view('stores.holiday');
    }

    public function showStoreTime($id)
    {
        $store = Store::findOrFail($id);
        return view('stores.time', [ 'store' => $store ] );
    }

    public function showStoreInfo($id)
    {
        $store = Store::findOrFail($id);
        return view('stores.store_info', [ 'store' => $store ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editTime($id)
    {
        $store = Store::findOrFail($id);
        return view('stores.edit_time', ['store' => $store]);
    }

    public function editHoliday()
    {
        return view('stores.edit_holiday');
    }

    public function editCategory()
    {
        return view('stores.edit_category');
    }

    public function editStoreInfo($id)
    {
        $store = Store::findOrFail($id);
        return view('stores.edit_store_info', ['store' => $store]);
    }

    public function editStoreLogo($id)
    {
        $store = Store::findOrFail($id);
        return view('stores.edit_store_logo', ['store' => $store]);
    }

    public function editStoreImages($id)
    {
        $store = Store::findOrFail($id);
        return view('stores.edit_store_images', ['store' => $store]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStoreInfo(StoreInfosRequest $request, $id)
    {
        // 店舗情報取得
        $store = Store::findOrFail($id);

        // // 店舗情報更新
        $store->name = $request->name;
        $store->phone = $request->phone;
        $store->postcode = $request->postcode;
        $store->address = $request->address;
        $store->comment = $request->comment;
        $store->save();

        // 更新メッセージ
        session()->flash('flash_message', '店舗情報の更新が完了しました');

        return view('stores.store_info', ['store' => $store]);

    }

    public function updateStoreTime(StoreTimesRequest $request, $id)
    {
        // 店舗情報情報取得
        $store = Store::findOrFail($id);

        
        // 店舗情報更新
        $store->earliest_receivable_time = $request->earliest_receivable_time;


        $start_time = $request->start_hour . ':' . $request->start_min;
        $store_start_time = new Carbon($start_time);
        $store->start_time = $store_start_time->format('H:i');

        $end_time = $request->end_hour . ':' . $request->end_min;
        $store_end_time = new Carbon($end_time);
        $store->end_time = $store_end_time->format('H:i');

        $store->serve_range_time = $request->serve_range_time;
        $store->capacity = $request->capacity;
        
        $store->save();
        
        // 更新メッセージ
        session()->flash('flash_message', '店舗営業時間の更新が完了しました');

        return view('stores.time', ['store' => $store]);

    }

    public function uploadStoreLogo(StoreLogosRequest $request, $id) {

        if ($request->file('logo')->isValid([])) {

            // 画像の保存
            $path = $request->file('logo')->store('/'); 
            Storage::move($path, 'public/storeLogo/' . $path);

            //画像アップロード時に既に他の画像がアップロードされている場合に既存の画像を削除
            $store = Store::findOrFail($id);
            Storage::disk('local')->delete('public/storeLogo/'.$store->logo);

            //新規画像ファイル名保存(or上書き)
            $store->logo = $path;
            $store->save();
        
            return back()->with('flash_message', '店舗ロゴ画像の投稿が完了しました');

        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors();
        }

    }

    public function uploadStoreImages(StoreImagesRequest $request, $id) {

        if ($request->hasFile('top_images')) {

            // 全画像リセット
            $store = Store::findOrFail($id);
            Storage::disk('local')->delete('public/storeImages/'.$store->top_image1);
            Storage::disk('local')->delete('public/storeImages/'.$store->top_image2);
            Storage::disk('local')->delete('public/storeImages/'.$store->top_image3);
            
            // 全画像ファイル名リセット
            $store->top_image1 = null;
            $store->top_image2 = null;
            $store->top_image3 = null;
            $store->save();

            // カウント用変数初期化
            $i=0;
            
            // 画像更新処理
            foreach ($request->file('top_images') as $top_image ) {

                // カウント用変数
                $i++;
            
                if ($i === 1) {

                    // 画像1の保存
                    $path1 = $top_image->store('/'); 
                    Storage::move($path1, 'public/storeImages/' . $path1);

                    //画像1 ファイル名格納
                    $store->top_image1 = $path1;
                }
                
                if ($i === 2) {

                    // 画像2の保存
                    $path2 = $top_image->store('/'); 
                    Storage::move($path2, 'public/storeImages/' . $path2);

                    //画像2 ファイル名格納
                    $store->top_image2 = $path2;
                }

                if ($i === 3) {

                    // 画像3の保存
                    $path3 = $top_image->store('/'); 
                    Storage::move($path3, 'public/storeImages/' . $path3);

                    //画像3 ファイル名格納
                    $store->top_image3 = $path3;
                }

                // 画像名更新
                $store->save();
            }

            return back()->with('flash_message', '店舗用トップ画像の投稿が完了しました');    
        }

        // 添付がない場合のエラーメッセージ
        return back()->with('error_message', '画像をアップロードしてください');
    }
}
