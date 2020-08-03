<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;


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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function editStoreLogo()
    {
        return view('stores.edit_store_logo');
    }

    public function editStoreImages()
    {
        return view('stores.edit_store_images');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function updateStoreInfo(Request $request, $id)
    {
        //
    }

    public function updateStoreTime(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
