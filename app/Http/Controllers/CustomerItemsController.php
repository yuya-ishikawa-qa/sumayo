<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// CustomerItemsモデル使用
use\App\Items;
use\App\Store;
use\App\StoreHoliday;

// 日時Carbon使用
use Carbon\Carbon;

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
        $store = Store::all();

        $holidays = StoreHoliday::where('is_holiday', '1')->where('date')->get();
        dd($holidays);
        foreach ($holidays as  $holiday) {

            $holidays_list[] = $holiday->date;

        }
        
        // for ($i = 1; $i < $holiday->id ; $i++) {
        //     $date[] =
        // } 

        // extract($holidays_list);


        
        // dd($holidays_list);
        


        $now = Carbon::now()->format('Ym');
        dd($now);
        // $now->addMonth();
        $start_month = Carbon::now()->startOfMonth();
        $end_month = Carbon::now()->endOfMonth();

        var_dump($holidays_list->between($start_month,$end_month));
        if($holidays_list->between($start_month,$end_month)){

            
        }
        
        dd($yes);

          // 休日情報取得
          $holidays = StoreHoliday::all(); 
          foreach ($holidays as $holiday) {
              $holidays_list[$holiday->date] = $holiday->is_holiday;
          }

          dd($holidays_list);
  
    //       return view('stores.holiday', compact('calendar','store_id','holidays_list'));
    //   }

// dd($storeholiday->is_holiday);

        // 結果をビューに渡す
        return view('shopinfo',['store' => $store, 'StoreHoliday' => $StoreHoliday]);
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
