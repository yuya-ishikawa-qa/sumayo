<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Itemsモデル使用
use App\Items;
// 商品登録バリデーション用のRequest
use App\Http\Requests\ItemsRequest;
// 画像保存用
use Illuminate\Support\Facades\Storage;


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

            // if ($request->file('path')->isValid([])) {
            // ↑だとfileない場合エラーになるので↓にする
            if ($request->hasfile('path')) {

                // 画像の保存(高橋さんと同じ方法)
                // $path = $request->file('path')->store('/');
                // ローカルへの保存
                // Storage::move($path, 'public/items/' . $path);
                // $request->path = $path;

                // AWS S3への保存
                $file = $request->file('path');
                $path = Storage::disk('s3')->putFile('/', $file, 'public');

                $request->path = Storage::disk('s3')->url($path);
                // $request->path = $path;
    
            } else {
                $request->path = "";
            }
        
        // データベーステーブルitems内容を入れる
        Items::create([
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
         $item = Items::findOrFail($id);
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
        $item = Items::findOrFail($id);

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
        $item = Items::findOrFail($id);
      
        //値を代入
        $item->item_name = $request->item_name;
        $item->price = $request->price;
        $item->tax = $request->tax;
        $item->description = $request->description;
        $item->is_selling = $request->is_selling;
        $item->item_category_id = $request->item_category_id;
        $item->stock_sunday = $request->stock_sunday;
        $item->stock_monday = $request->stock_monday;
        $item->stock_tuesday = $request->stock_tuesday;
        $item->stock_wednesday = $request->stock_wednesday;
        $item->stock_thursday = $request->stock_thursday;
        $item->stock_friday = $request->stock_friday;
        $item->stock_saturday = $request->stock_saturday;

        if(is_null($request->path)) {
            $item->path == $item->path;
            
        } elseif ($request->hasfile('path')) {

            // 画像の保存(高橋さんと同じ方法)
            // $path = $request->file('path')->store('/'); 
            // Storage::move($path, 'public/items/' . $path);

            // $item->path = $path;

            // AWS S3への保存
            $file = $request->file('path');
            $path = Storage::disk('s3')->putFile('/', $file, 'public');

            $item->path = Storage::disk('s3')->url($path);

        } else {
            $item->path = "";
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
         $item = Items::findOrFail($id);
         //削除
         $item->delete();
         //リダイレクト
         return redirect()->to('/items');
    }
}
