<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Items;

class CustomerInfoController extends Controller
{
    public function create()
    {
        if(is_array(session()->get('cart')) && count(session()->get('cart')) > 0){
            # カートに商品が入っている場合
            $controller = app()->make('App\Http\Controllers\BuyController');
            $get_available_date = $controller->get_available_date();

            $controller = app()->make('App\Http\Controllers\BuyController');
            $get_times = $controller->get_times();

            return view('order_form', [
                'get_available_date' => $get_available_date,
                'get_times' => $get_times,
            ]);
        }else{
            # カートに商品が入っていない場合はカート画面に遷移
            $controller = app()->make('\App\Http\Controllers\OrderItmesController');
            return $controller->index();
        }
    }
}
