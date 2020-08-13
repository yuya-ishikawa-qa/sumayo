<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Items;

class OrderItmesController extends Controller
{
    public function index()
    {
        return view('cart');
    }

    public function store(Request $request)
    {
        # 商品id取得
        $id = $request->query('get_id');

        # 商品が存在するか確認
        Items::findOrFail($id);

        # 数量が自然数であるか確認
        if(preg_match("/^[0-9]*$/", $request->quantity) === 1 && $request->quantity > 0){

            # カートの商品を取得
            $cart = session()->pull('cart');

            # $cartの方が配列でない場合は配列に直す
            if(!is_array($cart)){
                $cart = [];
            }

            # カートに商品を追加する
            if(!empty($cart[$id])){
                # 既に商品がカートに入っている場合
                $cart[$id] += (int)$request->quantity;
            }else{
                # カートに該当商品がない場合
                $cart[$id] = (int)$request->quantity;
            }

            # カートに商品を戻す
            session(['cart' => $cart]);
        }else{
            # 追加する数量が不明のため商品詳細画面を表示する
            return redirect()->route('detail',['id' => $id]);
        }

        # 画面遷移先の決定
        if($request->next_page === 'index'){
            # 商品一覧（TOPページ）が指定されている場合は商品一覧へ
            return redirect()->route('top');
        }else{
            # next_pageにカート画面が選択されている、または画面が選択されていない場合はカートへ
            return redirect()->route('cart.index');
        }

    }

    public function update($post_id, Request $request)
    {
        # 商品が存在するか確認
        Items::findOrFail($post_id);

        # 数量が自然数であるか確認
        if(preg_match("/^[0-9]*$/", $request->quantity) === 1 && $request->quantity > 0){

            # カートの商品を取得
            $cart = session()->pull('cart');

            # $cartの方が配列でない場合は配列に直す
            if(!is_array($cart)){
                $cart = [];
            }

            # カートに商品を追加する
            $cart[$post_id] = (int)$request->quantity;

            # カートに商品を戻す
            session(['cart' => $cart]);
        }

        # カート画面表示
        return redirect()->route('cart.index');

    }

    public function destroy($post_id)
    {
        # カートの商品を取得
        $cart = session()->pull('cart');

        # カートに商品が存在すれば商品を削除
        if(!empty($cart[$post_id])){
            unset($cart[$post_id]);
        }

        # カートに商品を戻す
        session(['cart' => $cart]);

        # カート画面表示
        return redirect()->route('cart.index');

    }
}
