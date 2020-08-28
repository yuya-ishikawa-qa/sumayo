@extends('layouts.app')

@section('content')
<div class="order-list">
    <div class="search">
        <form id="search_form" action="{{route('orders.index')}}" method="get">
            {{csrf_field()}}
            <input id="date" name="date" class="form-control" type="date" value="{{ $search_date->format('Y-m-d') }}">
            @php
            $search_date->modify('- 1 days');
            @endphp
            <button name="date_btn" class="btn btn-primary date_btn mt-1" type="submit" value="{{ $search_date->format('Y-m-d') }}">前</button>
            <button name="date_btn" class="btn btn-primary date_btn mt-1" type="submit" value="{{ $today->format('Y-m-d') }}">今日</button>
            @php
            $search_date->modify('+ 2 days');
            @endphp
            <button name="date_btn" class="btn btn-primary date_btn mt-1" type="submit" value="{{ $search_date->format('Y-m-d') }}">次</button>
        </form>
    </div>
    <form class="mt-1" action="{{route('orders.updateMultiple')}}" method="post">
        {{csrf_field()}}
        {{ method_field('PUT')}}
        <div class="order-area">
            <button class="btn btn-primary">完了にする</button>
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
                    <span class="bg-info">{{ $order_status_list[$order->order_status] }}</span>
                    合計{{ number_format($order->order_total_price) }}円<br>
                    @foreach ($orderitems as $k => $item)
                    @if($orderitems->count() === $k)
                    {{ $item->item_name }}×{{ $item->quantity }}
                    @else
                    {{ $item->item_name }}×{{ $item->quantity }}<br>
                    @endif
                    @endforeach
                </div>
                <div class="operation">
                    <a href="{{route('orders.show',['id' => $order->id])}}"><button type="button">詳細確認</button></a><br>
                    <label><input name="complete[]" type="checkbox" value="{{ $order->id }}">完了</label>
                </div>
            </div>
            @endforeach
        </div>
        @php
        $search_date->modify('- 1 days');
        @endphp
        <input type="hidden" name="check_date" value="{{ $search_date->format('Y-m-d') }}">
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#date').change(function() {
            var form = $(this).parents().find('form#search_form');
            $(form).submit();
        });
    });

</script>
@endsection
