<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Itemsモデル使用
use App\Items;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // 商品一覧(お店側)
    public function index(Items $post)
    {

        $items = Items::orderBy('updated_at', 'desc')->get();

        return view('items',["items" => $items,'path' => str_replace('public/', 'storage/', $post->path)]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // 商品登録(お店側)
    public function create(Request $request)
    {

        // 曜日ごとの在庫は後で
        // バリデーションチェック
        $request->validate([
            'item_name' => 'required|string|max:50',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'stock_all' => 'nullable|numeric',
            'stock_monday' => 'nullable|numeric',
            'stock_tuesday' => 'nullable|numeric',
            'stock_wednesday' => 'nullable|numeric',
            'stock_thursday' => 'nullable|numeric',
            'stock_friday' => 'nullable|numeric',
            'stock_saturday' => 'nullable|numeric',
            'stock_sunday' => 'nullable|numeric',

        ],
        [
            'item_name.required' => '商品名を入力してください',
            'price.required' => '価格を入力してください',
            'description.required' => ' 商品説明を入力してください',
            // 'stock_all.required' => ' 在庫数は数量を入力してください',
        ]);


        // 内容の受け取って変数に入れる
        // return view('item_register');
        $item_name = $request->input('item_name');
        $price = $request->input('price');
        $tax = $request->input('tax');
        $description = $request->input('description');
        $is_selling = $request->input('is_selling');
        $item_category_id = $request->input('item_category_id');
        $stock_all = $request->input('stock_all');
        $stock_sunday = $request->input('stock_sunday');
        $stock_monday = $request->input('stock_monday');
        $stock_tuesday = $request->input('stock_tuesday');
        $stock_wednesday = $request->input('stock_wednesday');
        $stock_thursday = $request->input('stock_thursday');
        $stock_friday = $request->input('stock_friday');
        $stock_saturday = $request->input('stock_saturday');
        $path = $request->input('path');

        // 在庫一括入力された場合
        if($stock_all >= 0 ){
            $stock_sunday = 0;
            $stock_monday = 0;
            $stock_tuesday = 0;
            $stock_wednesday = 0;
            $stock_thursday = 0;
            $stock_friday = 0;
            $stock_saturday = 0;
        } else {
            $stock_all = 0;
        }


        if($request->hasFile('path')) { 
            //ファイル名取得
            $filename = $request->file('path')->getClientOriginalName();
            //storage\app\images に画像が保存されました
            // $request->images->storeAs('path',date("Ymd").'_'.$filename);
            //DBに登録するパス
            // $member->image = date("Ymd").'_'.$filename;
            $path = $request->path->storeAs('items',date("Y-m-d H:i:s").'_'.$filename);

            } else {
                $path = "";
            }

        // $post->path = $request->path->storeAs('public/post_images', '_'. '.jpg');
        // $path = $request->path->storeAs('public/','{{ $request->path }}', '_'. '.jpg');
        // $path = $request->path->storeAs('public/','{{ $request->path }}.jpg');
        // $path = $request->path->storeAs('items/',date("Ymd").'_'.$filename);


        
        // データベーステーブルitems内容を入れる
        // 確認してOKなら全項目追加
        // Items::insert(["item_name" => $item_name,
        // "price"  => $price,
        // "is_selling"  => $is_selling,]); 
        Items::insert([
            "item_name" => $item_name,
            "price"  => $price, 
            "tax" => $tax,
            "description" => $description, 
            "is_selling"  => $is_selling, 
            "item_category_id"  => $item_category_id, 
            "stock_all"  => $stock_all, 
            "stock_sunday"  => $stock_sunday, 
            "stock_monday"  => $stock_monday, 
            "stock_tuesday"  => $stock_tuesday, 
            "stock_wednesday"  => $stock_wednesday, 
            "stock_thursday"  => $stock_thursday, 
            "stock_friday"  => $stock_friday, 
            "stock_saturday"  => $stock_saturday, 



            "path"  => $path
            ]); 
        
        // $items = Items::all(); // 全データの取り出し
        $items = Items::orderBy('updated_at', 'desc')->get();

        

        // 変数をビューに渡す
        return view('items',["items" => $items]);
        // ["item_name" => $item_name,
        // "price"  => $price
        // ]);
        // return view('items')->with([
        // "item_name" => $item_name,
        // "price"  => $price,
        // "is_selling"  => $is_selling,
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('item_register');
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

    // // 商品一覧(お店側)
    // public function showItems()
    // {
    //     return view('items');
    // }

    // 商品詳細(お店側)
    // public function showItemsDetail($id)
    public function showItemsDetail()
    {
        // $item = Items::find($id);

        // return view('item_detail',["item" => $item]);
        return view('item_detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // // 商品編集(お店側)
    // public function edit($id)
    // {
    //     return view('item_edit');
    // }

     // 商品編集(お店側)
    public function editItemsDetail()
    {
        return view('item_edit');
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
