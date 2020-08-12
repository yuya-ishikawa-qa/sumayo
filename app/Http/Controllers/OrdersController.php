<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\Customer;
use App\OrderItem;

class OrdersController extends Controller
{
    const order_status_list = [
        1 => '受取前',
        2 => '受取済',
        3 => '破棄',
    ];

    public function index(Request $request)
    {
        # 日付チェック
        $input_date = '';
        $today = $search_date = null;

        if(!empty($request->input('date_btn'))){
            $input_date = $request->input('date_btn');
        }elseif(!empty($request->input('date'))){
            $input_date = $request->input('date');
        }

        $today = date_create(date("Y-m-d"));
        if (strptime($input_date, '%Y-%m-%d')) {
            list($Y, $m, $d) = explode('-', $input_date);

            if(checkdate($m, $d, $Y) === true) {
                $search_date = date_create($input_date);
            }else{
                # 当日を検索
                $search_date = date_create(date("Y-m-d"));
            }
        }elseif(strptime($input_date, '%Y/%m/%d')){
            list($Y, $m, $d) = explode('/', $input_date);

            if(checkdate($m, $d, $Y) === true) {
                $search_date = date_create($input_date);
            }else{
                # 当日を検索
                $search_date = date_create(date("Y-m-d"));
            }
        }else{
            # 当日を検索
            $search_date = date_create(date("Y-m-d"));
        }

        $orders = Order::where('recieved_date', $search_date->format('Y-m-d'))->orderBy('recieved_date','asc')->paginate(50);;

        return view('orders/index', [
            'orders' => $orders,
            'today' => $today,
            'search_date' => $search_date,
            'order_status_list' => self::order_status_list,
        ]);
    }

    public function show($id)
    {

        $orders = Order::find([$id]);

        if($orders->count() === 1){
            foreach( $orders as $value){
                $order = $value;
                $customer = $value->customer()->first();
                $orderitems = $value->orderitems()->orderBy('id', 'asc')->get();
            }

            $sub_total = $tax_total = 0; #初期化
            $recieved_date = date_create($order->recieved_date);

            return view('orders/show', [
                'order' => $order,
                'customer' => $customer,
                'orderitems' => $orderitems,
                'sub_total' => $sub_total,
                'tax_total' => $tax_total,
                'recieved_date' => $recieved_date,
                'order_status_list' => self::order_status_list,
            ]);
        }else{
            # 表示できる情報がないため注文一覧へ遷移
            return $this->index();
        }
    }

    public function edit($id)
    {

        $orders = Order::find([$id]);

        if($orders->count() === 1){
            foreach( $orders as $value){
                $order = $value;
                $customer = $value->customer()->first();
                $orderitems = $value->orderitems()->orderBy('id', 'asc')->get();
            }

            $recieved_date = date_create($order->recieved_date);

            return view('orders/edit', [
                'order' => $order,
                'customer' => $customer,
                'orderitems' => $orderitems,
                'recieved_date' => $recieved_date,
                'order_status_list' => self::order_status_list,
            ]);
        }else{
            # 表示できる情報がないため注文一覧へ遷移
            return $this->index();
        }

    }

    public function update($id, Request $request)
    {

        $params = $request->validate([
            'order_status' => 'required',
            'comment' => '',
        ]);

        $post = Order::findOrFail($id);
        $post->fill($params)->save();

        return redirect()->route('orders.show',['id' => $id]);
    }


}
