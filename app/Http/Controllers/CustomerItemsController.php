<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Calendar\CalendarView;

// CustomerItemsモデル使用
use\App\Items;
use\App\Store;
use\App\StoreHoliday;


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
        // $items = Items::all();

        // 販売休止中なのは非表示
        $items = Items::where('is_selling', '0')->orderBy('item_category_id', 'asc')->get();

        $store = Store::all();

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
    public function showDetail($id)
    {
        // お客さん画面の全ページできたらこっちで↓headerのlogoが表示できるようにする
        //     $item = Items::find($id);
        //     $store = Store::all();
        //     return view('detail',['item' => $item, 'store' => $store]);


            // 販売休止中なのは非表示
            $item = Items::where('is_selling', '0')->findOrFail($id);

             // 結果をビューに渡す
             return view('detail')->with('item',$item);


    }

    // カート情報
    public function showCart()
    {
        return view('cart');
    }

    // 店舗情報
    public function showShopinfo()
    {
        
        // store情報 取得
        $store = Store::all();

        //カレンダーに日付を渡す
		$calendar = new CalendarView(time());
        
        // 休日情報取得
        $holidays = StoreHoliday::where('is_holiday','1')->get();

        $holidays_list = [];
        foreach ($holidays as $holiday) {
            $holidays_list[$holiday->date] = $holiday->is_holiday;
        }

        // 結果をビューに渡す
		return view('shopinfo', compact('calendar','store','holidays_list'));

        // return view('shopinfo',['store' => $store]);
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
