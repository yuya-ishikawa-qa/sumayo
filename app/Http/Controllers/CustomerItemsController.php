<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// CustomerItemsモデル使用
use\App\Items;
use\App\Store;

class CustomerItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // TOP
    public function index()
    {
        // モデルできたらこっち使う
        $items = Items::all();

        $store = Store::all();
        // $items = CustomerItems::orderBy('id','desc');
        
        // return view('index', [
        //     'items' => $items,
        // ]);

        return view('index',['items' => $items, 'store' => $store]);
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
    public function showDetail($id)
    {
             // レコード検索
             $item = Items::find($id);
             // 結果をビューに渡す
             return view('detail')->with('item',$item);

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
        $store = Store::all();

        return view('shopinfo',['store' => $store]);
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
