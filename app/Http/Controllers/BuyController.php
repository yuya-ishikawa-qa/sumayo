<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Store;
use App\StoreHoliday;
use App\Order;
use App\Customer;
use App\OrderItem;
use App\Items;

use App\Http\Requests\BuyRequest;

class BuyController extends Controller
{
    public function show(BuyRequest $request)
    {
        if(is_array(session()->get('cart')) && count(session()->get('cart')) > 0){
            # カートに商品が入っている場合

            # 顧客情報をセッションに入れる
            $array = []; # 初期化
            $array = [
                'recieved_date' => $request->recieved_date,
                'recieved_time' => $request->recieved_time,
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'last_name_kana' => $request->last_name_kana,
                'first_name_kana' => $request->first_name_kana,
                'tel' => $request->tel,
                'mail' => $request->mail,
                'comment' => $request->comment,
            ];
            session(['order' => $array]);

            return view('order_confirmation');
        }else{
            # カートに商品が入っていない場合はカート画面に遷移
            $controller = app()->make('\App\Http\Controllers\OrderItmesController');
            return $controller->index();
        }
    }

    public function store()
    {
        if(is_array(session()->get('cart')) && count(session()->get('cart')) > 0 && session()->get('order') && count(session()->get('order')) > 0){
            # カートに商品が入っていてかつ顧客情報もある場合


            $item_total = $tax_total = 0; #初期化
            $item_list = []; #初期化
            foreach(session()->get('cart') as $key => $value){
                $sub_total = 0;# 初期化

                # 商品取得
                $items = Items::find([$key]);
                foreach($items as $v){
                    $item = $v;
                }

                $item_list[] = [
                    'item_id' => $key,
                    'quantity' => $value,
                    'item_name' => $item->item_name,
                    'price' => $item->price,
                    'tax' => $item->tax,
                    'image' => $item->path,
                ];

                # 金額計算
                $sub_total = $item->price * $value;
                $item_total += $item->price * $value;
                $tax_total += $item->price * $item->tax / 100 * $value;
            }

            \DB::beginTransaction();
            try {
                $store = Store::orderBy('id')->first();

                $flight_order = Order::create([
                    'store_id' => $store->id,
                    'order_status' => 1,
                    'recieved_date' => session()->get('order')['recieved_date'],
                    'recieved_time' => sprintf('%s:00',session()->get('order')['recieved_time']),
                    'order_total_price' => $item_total,
                    'comment' => session()->get('order')['comment'],
                ]);

                Customer::create([
                    'order_id' => $flight_order->id,
                    'last_name' => session()->get('order')['last_name'],
                    'first_name' => session()->get('order')['first_name'],
                    'last_name_kana' => session()->get('order')['last_name_kana'],
                    'first_name_kana' => session()->get('order')['first_name_kana'],
                    'mail' => session()->get('order')['mail'],
                    'tel' => session()->get('order')['tel'],
                ]);

                foreach($item_list as $value){
                    OrderItem::create([
                        'order_id' => $flight_order->id,
                        'item_id' => $value['item_id'],
                        'quantity' => $value['quantity'],
                        'item_name' => $value['item_name'],
                        'price' => $value['price'],
                        'tax' => $value['tax'],
                        'image' => $value['image'],
                    ]);
                }

                # カート、顧客情報を空に
                session()->forget('cart');
                session()->forget('order');

                \DB::commit();
            } catch (\Exception $e) {
                dd($e);
                $flight_order = null;
                \DB::rollback();
            }

            return view('order_confirm',[
                'flight_order' => $flight_order
            ]);
        }else{
            # カートに商品が入っていないまたは顧客情報が入っていない場合はカート画面に遷移
            $controller = app()->make('\App\Http\Controllers\OrderItmesController');
            return $controller->index();
        }
    }

    public function get_available_date()
    {
        $return = [];

        # 店舗情報取得
        $store = Store::orderBy('id')->first();

        # 予約可能期間の始めを設定する
        $set_date = $end_date = date_create(date("Y-m-d"));
        $set_date->modify(sprintf('+ %d minutes',$store->serve_range_time)); #本日の予約が可能かどうか
        $set_date->setTime(00, 00, 00);

        # 予約可能期間の終わりを設定する
        $end_date = date_create(date("Y-m-d"));
        $end_date->modify('+ 30 days'); #30日後まで予約可能とする

        # 予約可能期間中の休日のリストを取得する
        $check_date = [];
        $set_date_text = $set_date->format('Ymd');
        $end_date_text = $end_date->format('Ymd');
        $store_holiday = StoreHoliday::where([
            ['date', '>=', $set_date_text],
            ['date', '<=', $end_date_text],
            ['is_holiday', '=', 1],
        ])->get();
        foreach($store_holiday as $v){
            $check_date[] = $v->date;
        }

        # 予約可能期間から予約可能日を取得する
        while($set_date <= $end_date){

            if(!in_array($set_date->format('Ymd'), $check_date)){
                # 休日は予約可能日に含めない
                $return[] = $set_date->format('Y-m-d');
            }

            $set_date->modify('+ 1 days');
        }


//        # 予約可能期間中の休日のリストを取得する
//        $check_date = [];
//        $set_date_text = $set_date->format('Y-m-d');
//        $end_date_text = $end_date->format('Y-m-d');
//        $store_holiday = StoreHoliday::where([
//            ['holiday', '>=', $set_date_text],
//            ['holiday', '<=', $end_date_text],
//        ])->get();
//        foreach($store_holiday as $v){
//            $check_date[] = $v->holiday;
//        }
//
//        # 予約可能期間から予約可能日を取得する
//        while($set_date <= $end_date){
//
//            if(!in_array($set_date->format('Y-m-d'), $check_date)){
//                # 休日は予約可能日に含めない
//                $return[] = $set_date->format('Y-m-d');
//            }
//
//            $set_date->modify('+ 1 days');
//        }

        return $return;

    }

    public function get_times()
    {
        $return = [];

        # 店舗情報取得
        $store = Store::orderBy('id')->first();

        # 基準を設定(時間の管理のために使う日付は1980年1月1日とする)
        $set_time = date_create(sprintf('1980-01-01 %s',$store->start_time));
        $next_time = date_create(sprintf('1980-01-01 %s',$store->start_time));
        $end_time = date_create(sprintf('1980-01-01 %s',$store->end_time));

        #$set_timeの次の予約時間である$next_timeはあらかじめ1回分進めておく
        $next_time->modify(sprintf('+ %d minutes',$store->serve_range_time));

        while($next_time <= $end_time){
            $return[] = $set_time->format('H:i:s');

            # 1回分時間を進める
            $set_time->modify(sprintf('+ %d minutes',$store->serve_range_time));
            $next_time->modify(sprintf('+ %d minutes',$store->serve_range_time));
        }

        return $return;

    }
}
