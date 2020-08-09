@extends('layouts.app')

@section('content')
<div class="order-list">
    <div class="search">
        <form>
            <input class="form-control" name="test" type="date" value="2020-07-15" id="last_name">
            <button class="btn btn-primary" type="button">前</button>
            <button class="btn btn-primary" type="button">今日</button>
            <button class="btn btn-primary" type="button">次</button>
        </form>
    </div>
    <form action="{!! url('/order_detail'); !!}">
        <div class="order-area">
            <button class="btn btn-primary" type="button">完了にする</button>
            <div class="order-item">
                <div class="time">時間</div>
                <div class="title">内容</div>
                <div class="operation"></div>
            </div>
            @foreach ($orders as $key => $order)
            @php

            $customer = $order->customer()->first();
            $orderitems = $order->orderitems()->orderBy('id', 'asc')->get();

            @endphp

            @if($key % 2 === 0)
            <div class="order-item">
            @else
            <div class="order-item bg-secondary">
            @endif
                <div class="time">{{ $order->recieved_time }}</div>
                <div class="content">{{ $customer->last_name }} {{ $customer->first_name }}<br>
                    @if($order->order_status == 1)
                    <span class="bg-info">受取前</span>
                    @elseif($order->order_status == 2)
                    <span class="bg-info">受取済</span>
                    @elseif($order->order_status == 3)
                    <span class="bg-info">破棄</span>
                    @endif

                    合計{{ $order->order_total_price }}円<br>
                    @foreach ($orderitems as $k => $item)
                    @if($orderitems->count() === $k)
                    {{ $item->item_name }}×{{ $item->quantity }}
                    @else
                    {{ $item->item_name }}×{{ $item->quantity }}<br>
                    @endif
                    @endforeach
                </div>
                <div class="operation">
                    <a href="/orders/{{$order->id}}/show"><button type="button">詳細確認</button></a><br>
                    <label><input type="checkbox">完了</label>
                </div>
            </div>
            @endforeach

        </div>
    </form>
</div>
@endsection
