@extends('layouts.app')

@section('content')
<div class="order-list">
    @if($update > 0)
    <p class="text-danger">更新しました</p>
    @endif
    <form id="search_form" action="{{route('orders.index')}}" method="get">
        <div class="search">
            {{csrf_field()}}
            <div>
                <input id="date" name="date" class="form-control" type="date" value="{{ $search_date->format('Y-m-d') }}">
            </div>
            <div class="mt-1 text-left">
                <select id="order_status" name="order_status">
                    <option value="0">全て</option>
                    @foreach ($order_status_list as $key => $value)
                    @if(!empty($order_status) && $order_status == $key)
                    <option value="{{ $key }}" selected>{{ $value }}</option>
                    @else
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="mt-1">
                @php
                $search_date->modify('- 1 days');
                @endphp
                <button name="date_btn" class="btn btn-primary date_btn" type="submit" value="{{ $search_date->format('Y-m-d') }}">前</button>
                <button name="date_btn" class="btn btn-primary date_btn" type="submit" value="{{ $today->format('Y-m-d') }}">今日</button>
                @php
                $search_date->modify('+ 2 days');
                @endphp
                <button name="date_btn" class="btn btn-primary date_btn" type="submit" value="{{ $search_date->format('Y-m-d') }}">次</button>
            </div>
        </div>
        {{csrf_field()}}
        {{ method_field('PUT')}}
        <div class="order-area">
            <button id="update" name="update" class="btn btn-primary mt-1" value="update">完了にする</button>
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
                    <label class="mt-3"><input name="complete[]" type="checkbox" value="{{ $order->id }}">完了</label>
                </div>
            </div>
            @endforeach
        </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('#date').change(function() {
                var form = $(this).parents().find('form#search_form');
                $(form).submit();
            });
            $('#order_status').change(function() {
                var form = $(this).parents().find('form#search_form');
                $(form).submit();
            });
        });

    </script>
    @endsection
