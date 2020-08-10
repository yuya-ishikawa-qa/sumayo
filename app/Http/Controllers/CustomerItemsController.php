<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// CustomerItemsモデル使用
use\app\CustomerItems;

class CustomerItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // TOP
    public function index(Request $request)
    {
        // モデルできたらこっち使う
        // $items = CustomerItems::orderBy('id','desc');
        
        // return view('index', [
        //     'items' => $items,
        // ]);

        return view('index');
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
    public function show($id)
    {
        //
    }

    // 商品詳細
    // public function showDetail(Request $request,Item $item,$id)
    public function showDetail()
    {
        return view('detail');

        // $items = CustomerItems::findOrFail($id);
        // return view('detail')->with([
        //     'items' => $items
        // ]);

    }
    // カートに追加のコントローラー必要？
    // カート情報
    public function showCart()
    {
        return view('cart');
    }
    // 店舗情報
    public function showShopinfo()
    {
        return view('shopinfo');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
