<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\Customer;
use App\OrderItem;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('recieved_date','asc')->paginate(50);;

        return view('order_list', [
            'orders' => $orders,
        ]);
    }

    public function show($id)
    {
        $orders = Order::where('id', $id)->orderBy('recieved_date','asc');
        return view('order_detail');
    }

    public function edit()
    {
        return view('order_edit');
    }

    public function update()
    {

    }

    public function destroy()
    {
        return view('order_list');
    }
}
