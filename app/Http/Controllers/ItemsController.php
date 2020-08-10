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

        return view('items',["items" => $items,

        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // 商品登録(お店側)
    public function create(Request $request)
    {
        return view('item_register');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            'price.required' => '価格は半角数量を入力してください',
            'description.required' => ' 商品説明を入力してください',
            'stock_all.required' => ' 在庫数は半角数量を入力してください',
            ]);
            
            
            // 内容の受け取って変数に入れる
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
            if( isset($stock_all) ){
                $stock_sunday = $stock_all;
                $stock_monday = $stock_all;
                $stock_tuesday = $stock_all;
                $stock_wednesday = $stock_all;
                $stock_thursday = $stock_all;
                $stock_friday = $stock_all;
                $stock_saturday = $stock_all;
            } 
            
            if($request->hasFile('path')) { 
                //ファイル名取得
                $filename = $request->file('path')->getClientOriginalName();
                $path = $request->path->storeAs('items',date("Y-m-d_H:i:s").'_'.$filename);

            } else {
                $path = "";
            }
        
        // データベーステーブルitems内容を入れる
        Items::insert([
            "item_name" => $item_name,
            "price"  => $price, 
            "tax" => $tax,
            "description" => $description, 
            "is_selling"  => $is_selling, 
            "item_category_id"  => $item_category_id, 
            "stock_sunday"  => $stock_sunday, 
            "stock_monday"  => $stock_monday, 
            "stock_tuesday"  => $stock_tuesday, 
            "stock_wednesday"  => $stock_wednesday, 
            "stock_thursday"  => $stock_thursday, 
            "stock_friday"  => $stock_friday, 
            "stock_saturday"  => $stock_saturday, 
            "path"  => $path
            ]); 
        
        // データの取り出し
        $items = Items::orderBy('updated_at', 'desc')->get();

        return redirect()->to('/items');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // 商品詳細(お店側)
    public function showItemsDetail($id)
    {
         // レコード検索
         $item = Items::find($id);
         // 結果をビューに渡す
         return view('item_detail')->with('item',$item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // 商品編集(お店側)
    public function edit($id)
    {
        
        // レコード検索
        $item = Items::find($id);

        // 結果をビューに渡す
        return view('item_edit')->with('item',$item);
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
            'price.required' => '価格は半角数量を入力してください',
            'description.required' => ' 商品説明を入力してください',
            'stock_all.required' => ' 在庫数は半角数量を入力してください',
            ]);

         //レコードを検索
        $item = Items::find($id);
      
        //値を代入
        $item->item_name = $request->item_name;
        $item->description = $request->description;
        $item->is_selling = $request->is_selling;
        $item->item_category_id = $request->item_category_id;
        $item->price = $request->price;
        $item->tax = $request->tax;

        if( isset($request->stock_all) ){
            $item->stock_sunday = $request->stock_all;
            $item->stock_monday = $request->stock_all;
            $item->stock_tuesday = $request->stock_all;
            $item->stock_wednesday = $request->stock_all;
            $item->stock_thursday = $request->stock_all;
            $item->stock_friday = $request->stock_all;
            $item->stock_saturday = $request->stock_all;
        } else {
            $item->stock_sunday = $request->stock_sunday;
            $item->stock_monday = $request->stock_monday;
            $item->stock_tuesday = $request->stock_tuesday;
            $item->stock_wednesday = $request->stock_wednesday;
            $item->stock_thursday = $request->stock_thursday;
            $item->stock_friday = $request->stock_friday;
            $item->stock_saturday = $request->stock_saturday;
        }
        
    if($request->hasFile('path')) { 
        if($item->path != $request->path) {
            $filename = $request->file('path')->getClientOriginalName();
            $item->path = $request->path->storeAs('items',date("Y-m-d H:i:s").'_'.$filename);
        } else {
            $item->path = "";
        }
    } else {
        $item->path == $request->path;
    }
    
        //保存（更新）
        $item->save();
        //リダイレクト
        return redirect()->to('/items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //削除対象レコードを検索
         $item = Items::find($id);
         //削除
         $item->delete();
         //リダイレクト
         return redirect()->to('/items');
    }
}
