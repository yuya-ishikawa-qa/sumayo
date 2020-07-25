<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('store.index');
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
        return view('store.holiday');
    }

    public function showStoreTime()
    {
        return view('store.time');
    }

    public function showStoreInfo()
    {
        return view('store.store_info');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editTime()
    {
        return view('store.edit_time');
    }

    public function editHoliday()
    {
        return view('store.edit_holiday');
    }

    public function editCategory()
    {
        return view('store.edit_category');
    }

    public function editStoreInfo()
    {
        return view('store.edit_store_info');
    }

    public function editStoreLogo()
    {
        return view('store.edit_store_logo');
    }

    public function editStoreImages()
    {
        return view('store.edit_store_images');
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
