<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

use App\Mail\OrderMail;

use App\User;
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

            /**************************
            予約可能かチェック
            **************************/

            # 店舗情報取得
            $store = Store::orderBy('id')->first();

            # 予約したい日をセット
            $check_date = date_create(sprintf("%s %s:00",session()->get('order')['recieved_date'],session()->get('order')['recieved_time']));

            ## 休日でないかチェックする
            $holidays = StoreHoliday::where([
                ['date', '=', $check_date->format('Ymd')],
                ['is_holiday', '=', 1],
            ])->count();

            if($holidays > 0){
                ### 定休日で予約不可なため、エラーを返す
                \Session::flash('flash_message', '※定休日のため予約できません');
                return redirect()->route('customerinfo.create');
            }

            ## 営業時間内かチェックする
            ### 営業時間をセット
            $start_time = date_create(sprintf("%s %s",session()->get('order')['recieved_date'],$store->start_time));
            $end_time = date_create(sprintf("%s %s",session()->get('order')['recieved_date'],$store->end_time));

            if($check_date < $start_time || $check_date > $end_time){
                ### 営業時間外で予約不可なため、エラーを返す
                \Session::flash('flash_message', '※営業時間外のため予約できません');
                return redirect()->route('customerinfo.create');
            }


            ## 選択された時間がルールに沿ったものかチェック
            ### ルールに沿った時間を取得
            $times_list = $this->get_times();
            if(!in_array($check_date->format('H:i:s'),$times_list)){
                ### ルール外ため、エラーを返す
                \Session::flash('flash_message', '※ご希望の時間では予約できません');
                return redirect()->route('customerinfo.create');
            }


            ## 予約不可の直前予約でないかチェック
            ### 本日の予約が可能かどうかの基準値を設定する
            $set_date = date_create(date("Y-m-d H:i:s"));
            $text = sprintf('+ %d minutes',$store->earliest_receivable_time);
            $set_date->modify(sprintf('+ %d minutes',$store->earliest_receivable_time));

            if($set_date > $check_date){
                ### 予約可能時間を過ぎているため、エラーを返す
                \Session::flash('flash_message', '※ご希望の日時では予約できません');
                return redirect()->route('customerinfo.create');
            }


            ## 同じ日時の予約数確認
            $orders = Order::where([
                ['recieved_date', '=', session()->get('order')['recieved_date']],
                ['recieved_time', '=', session()->get('order')['recieved_time']],
            ])->get();

            if($orders->count() >= $store->capacity){
                ###  予約受付不可なため、エラーを返す
                \Session::flash('flash_message', '※ご希望の日時では予約できません');
                return redirect()->route('customerinfo.create');
            }

            ## 商品在庫数にマッチしているか
            ### 商品IDの取得
            $item_id = [];
            $items = []; # 予約済みの注文を管理する
            foreach(session()->get('cart') as $k => $v){
                $item_id[] = $k;
                $items[$k] = 0;
            }

            ### 既に予約されている商品の数量取得
            $order_item = \DB::table('orders')->join('order_items','orders.id','=','order_items.order_id')->where('orders.recieved_date', '=', session()->get('order')['recieved_date'])->whereIn('order_items.item_id', $item_id)->get();

            foreach($order_item as $v){
                $items[$v->item_id] += (int)$v->quantity;
            }

            ### カートに入れた商品情報取得
            $stock_list = Items::find($item_id);

            foreach($stock_list as $v){
                $stock = 0;
                ### 曜日あたりの在庫数を取得
                switch($check_date->format('w')){
                        case('0'):
                        $stock = $v->stock_sunday;
                        break;
                        case('1'):
                        $stock = $v->stock_monday;
                        break;
                        case('2'):
                        $stock = $v->stock_tuesday;
                        break;
                        case('3'):
                        $stock = $v->stock_wednesday;
                        break;
                        case('4'):
                        $stock = $v->stock_thursday;
                        break;
                        case('5'):
                        $stock = $v->stock_friday;
                        break;
                        case('6'):
                        $stock = $v->stock_saturday;
                        break;
                }
                if($stock < ($items[$v->id] + session()->get('cart')[$v->id])){
                    ###  在庫数が足りないため、エラーを返す
                    \Session::flash('flash_message', sprintf('※ご希望の日時では%sの予約できません',$v->item_name));
                    return redirect()->route('customerinfo.create');
                }

                if($v->is_selling == 1){
                    ### 注文の注文不可なため、該当商品をカートから外しエラーを返す
                    # カートの商品を取得
                    $cart = session()->pull('cart');

                    # カートに商品が存在すれば商品を削除
                    if(!empty($cart[$v->id])){
                        unset($cart[$v->id]);
                    }

                    # カートに商品を戻す
                    session(['cart' => $cart]);

                    \Session::flash('flash_message', sprintf('※エラーが発生しました。恐れ入りますがはじめからやり直してください。',$v->item_name));
                    return redirect()->route('cart.index');
                }
            }

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
                $item = Items::find($key);

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
            /**************************
            予約可能かチェック
            **************************/

                # 店舗情報取得
                $store = Store::orderBy('id')->first();

                # 予約したい日をセット
                $check_date = date_create(sprintf("%s %s:00",session()->get('order')['recieved_date'],session()->get('order')['recieved_time']));

                ## 休日でないかチェックする
                $holidays = StoreHoliday::where([
                    ['date', '=', $check_date->format('Ymd')],
                    ['is_holiday', '=', 1],
                ])->count();

                if($holidays > 0){
                    ### 定休日で予約不可なため、エラーを返す
                    throw new \Exception('定休日の予約');
                }

                ## 営業時間内かチェックする
                ### 営業時間をセット
                $start_time = date_create(sprintf("%s %s",session()->get('order')['recieved_date'],$store->start_time));
                $end_time = date_create(sprintf("%s %s",session()->get('order')['recieved_date'],$store->end_time));

                if($check_date < $start_time || $check_date > $end_time){
                    ### 営業時間外で予約不可なため、エラーを返す
                    throw new \Exception('営業時間外の予約');
                }


                ## 選択された時間がルールに沿ったものかチェック
                ### ルールに沿った時間を取得
                $times_list = $this->get_times();
                if(!in_array($check_date->format('H:i:s'),$times_list)){
                    ### ルール外ため、エラーを返す
                    throw new \Exception('時間選択のルール外の予約');
                }


                ## 予約不可の直前予約でないかチェック
                ### 本日の予約が可能かどうかの基準値を設定する
                $set_date = date_create(date("Y-m-d H:i:s"));
                $text = sprintf('+ %d minutes',$store->earliest_receivable_time);
                $set_date->modify(sprintf('+ %d minutes',$store->earliest_receivable_time));

                if($set_date > $check_date){
                    ### 予約可能時間を過ぎているため、エラーを返す
                    throw new \Exception('予約可能時間超過の予約');
                }


                ## 同じ日時の予約数確認
                $orders = Order::where([
                    ['recieved_date', '=', session()->get('order')['recieved_date']],
                    ['recieved_time', '=', session()->get('order')['recieved_time']],
                ])->get();

                if($orders->count() >= $store->capacity){
                    ###  予約受付不可なため、エラーを返す
                    throw new \Exception('予約受付数超過の予約');
                }

                ## 商品在庫数にマッチしているか
                ### 商品IDの取得
                $item_id = [];
                $items = []; # 予約済みの注文を管理する
                foreach(session()->get('cart') as $k => $v){
                    $item_id[] = $k;
                    $items[$k] = 0;
                }

                ### 既に予約されている商品の数量取得
                $order_item = \DB::table('orders')->join('order_items','orders.id','=','order_items.order_id')->where('orders.recieved_date', '=', session()->get('order')['recieved_date'])->whereIn('order_items.item_id', $item_id)->get();

                foreach($order_item as $v){
                    $items[$v->item_id] += (int)$v->quantity;
                }

                ### カートに入れた商品情報取得
                $stock_list = Items::find($item_id);

                foreach($stock_list as $v){
                    $stock = 0;
                    ### 曜日あたりの在庫数を取得
                    switch($check_date->format('w')){
                        case('0'):
                            $stock = $v->stock_sunday;
                            break;
                        case('1'):
                            $stock = $v->stock_monday;
                            break;
                        case('2'):
                            $stock = $v->stock_tuesday;
                            break;
                        case('3'):
                            $stock = $v->stock_wednesday;
                            break;
                        case('4'):
                            $stock = $v->stock_thursday;
                            break;
                        case('5'):
                            $stock = $v->stock_friday;
                            break;
                        case('6'):
                            $stock = $v->stock_saturday;
                            break;
                    }

                    if($stock < ($items[$v->id] + session()->get('cart')[$v->id])){
                        ###  在庫数が足りないため、エラーを返す
                        throw new \Exception('商品在庫数超過の予約');
                    }

                    if($v->is_selling == 1){
                        ### 注文の注文不可なため、該当商品をカートから外しエラーを返す
                        # カートの商品を取得
                        $cart = session()->pull('cart');

                        # カートに商品が存在すれば商品を削除
                        if(!empty($cart[$v->id])){
                            unset($cart[$v->id]);
                        }

                        # カートに商品を戻す
                        session(['cart' => $cart]);

                        throw new \Exception('販売不可商品を含む予約');
                    }
                }

            /**************************
            DBへ登録
            **************************/

                $flight_order = Order::create([
                    'store_id' => $store->id,
                    'order_status' => 1,
                    'recieved_date' => session()->get('order')['recieved_date'],
                    'recieved_time' => sprintf('%s:00',session()->get('order')['recieved_time']),
                    'order_total_price' => $item_total,
                    'comment' => session()->get('order')['comment'],
                ]);

                $flight_customer = Customer::create([
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

            } catch (\Exception $e) {
                dd($e);

                $flight_order = null;
                \DB::rollback();
            }

            # メール送信
            ##ユーザー情報取得（メールアドレス）
            $user = User::where('is_owner', '=', 1)->first();

            ## メール送信
            Mail::to($flight_customer->mail)->send(new OrderMail($flight_order,$flight_customer,$item_list,$store,$user));

            # カート、顧客情報を空に
            session()->forget('cart');
            session()->forget('order');

            \DB::commit();

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
        $available_dates = [];

        # 店舗情報取得
        $store = Store::orderBy('id')->first();

        # 予約可能期間の始めを設定する
        $set_date = date_create(date("Y-m-d H:i:s"));
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
                $available_dates[] = $set_date->format('Y-m-d');
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
//                $available_dates[] = $set_date->format('Y-m-d');
//            }
//
//            $set_date->modify('+ 1 days');
//        }

        return $available_dates;

    }

    public function get_times()
    {
        $available_times = [];

        # 店舗情報取得
        $store = Store::orderBy('id')->first();

        # 基準を設定(時間の管理のために使う日付は1980年1月1日とする)
        $set_time = date_create(sprintf('1980-01-01 %s',$store->start_time));
        $next_time = date_create(sprintf('1980-01-01 %s',$store->start_time));
        $end_time = date_create(sprintf('1980-01-01 %s',$store->end_time));

        #$set_timeの次の予約時間である$next_timeはあらかじめ1回分進めておく
        $next_time->modify(sprintf('+ %d minutes',$store->serve_range_time));

        while($next_time <= $end_time){
            $available_times[] = $set_time->format('H:i:s');

            # 1回分時間を進める
            $set_time->modify(sprintf('+ %d minutes',$store->serve_range_time));
            $next_time->modify(sprintf('+ %d minutes',$store->serve_range_time));
        }

        return $available_times;

    }
}
