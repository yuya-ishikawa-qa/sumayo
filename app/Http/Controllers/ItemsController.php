<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Itemsモデル使用
use App\Items;
// 商品登録バリデーション用のRequest
use App\Http\Requests\ItemsRequest;

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

        return view('items',[
            "items" => $items,
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
    public function store(ItemsRequest $request)
    {       
            $stock_all = $request->stock_all;
            
            // 在庫一括入力された場合
            if( isset($stock_all) ){
                $request->stock_sunday = $stock_all;
                $request->stock_monday = $stock_all;
                $request->stock_tuesday = $stock_all;
                $request->stock_wednesday = $stock_all;
                $request->stock_thursday = $stock_all;
                $request->stock_friday = $stock_all;
                $request->stock_saturday = $stock_all;
            } 
            
            if($request->hasFile('path')) { 
                //ファイル名取得
                $filename = $request->file('path')->getClientOriginalName();
                $request->path = $request->path->storeAs('items',date("Y-m-d_H:i:s").'_'.$filename);

            } else {
                $request->path = "";
            }
        
        // データベーステーブルitems内容を入れる
        Items::insert([
            "item_name" => $request->item_name,
            "price"  => $request->price,
            "tax" => $request->tax,
            "description" => $request->description,
            "is_selling" => $request->is_selling,
            "item_category_id" => $request->item_category_id,
            "stock_sunday" => $request->stock_sunday,
            "stock_monday" => $request->stock_monday,
            "stock_tuesday" => $request->stock_tuesday,
            "stock_wednesday" => $request->stock_wednesday,
            "stock_thursday" => $request->stock_thursday,
            "stock_friday" => $request->stock_friday,
            "stock_saturday" => $request->stock_saturday,
            "path" => $request->path,
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
    public function update(ItemsRequest $request, $id)
    {

         //レコードを検索
        $item = Items::find($id);
      
        //値を代入
        $item->item_name = $request->item_name;
        $item->description = $request->description;
        $item->is_selling = $request->is_selling;
        $item->item_category_id = $request->item_category_id;
        $item->price = $request->price;
        $item->tax = $request->tax;

        $stock_all = $request->stock_all;

        if( isset($stock_all) ){
            $item->stock_sunday = $stock_all;
            $item->stock_monday = $stock_all;
            $item->stock_tuesday = $stock_all;
            $item->stock_wednesday = $stock_all;
            $item->stock_thursday = $stock_all;
            $item->stock_friday = $stock_all;
            $item->stock_saturday = $stock_all;
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
