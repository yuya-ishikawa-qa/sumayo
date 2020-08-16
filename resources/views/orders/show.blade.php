@extends('layouts.app')

@section('content')
<div class="info-area">
    <div class="text-center">
        <h3 class="login_title text-left d-inline-block mt-5">入力情報確認</h3>
    </div>

    <div class="item-area">
        <div class="item-list">
            <div class="img"></div>
            <div class="title">商品名</div>
            <div class="price">単価</div>
            <div class="quantity">数量</div>
            <div class="sub-total">小計</div>
        </div>
        @foreach ($orderitems as $k => $item)
        @php
        $price_total = 0; #初期化
        $price_total = $item->price * $item->quantity;
        $sub_total += $price_total;
        $tax_total += $item->price * $item->tax / 100 * $item->quantity;
        @endphp

        <div class="item-list">
            <div class="img"><div><img src="{{ asset('img/IMG_1506-1.jpg') }}" alt=""></div></div>
            <div class="title">{{ $item->item_name }}</div>
            <div class="price">{{ $item->price }}円 （{{ $item->tax }}%）</div>
            <div class="quantity">{{ $item->quantity }}個</div>
            <div class="sub-total">{{ number_format($price_total) }}円</div>
        </div>

        @endforeach

        <dl>
            <dt>商品小計</dt>
            <dd>{{ number_format($sub_total) }}円</dd>
            <dt>消費税</dt>
            <dd>{{ number_format(ceil($tax_total)) }}円</dd>
            <dt>商品合計</dt>
            <dd>{{ number_format($order->order_total_price) }}円</dd>
        </dl>
    </div>

    <div class="form-area">

        <div>
            <dl>
                <dt>ステータス</dt>
                <dd>{{ $order_status_list[$order->order_status] }}</dd>
            </dl>
        </div>

        <div>
            <dl>
                <dt>受取日</dt>
                <dd>{{ $recieved_date->format('Y年m月d日') }}</dd>
            </dl>
        </div>

        <div>
            <dl>
                <dt>受け取り時間</dt>
                <dd>{{ $order->recieved_time }}</dd>
            </dl>
        </div>

        <div class="half">
            <dl>
                <dt><label for="last_name">姓</label></dt>
                <dd>{{ $customer->last_name }}</dd>
            </dl>
        </div>

        <div class="half">
            <dl>
                <dt><label for="last_name">名</label></dt>
                <dd>{{ $customer->first_name }}</dd>
            </dl>
        </div>

        <div class="half">
            <dl>
                <dt>姓（カナ）</dt>
                <dd>{{ $customer->last_name_kana }}</dd>
            </dl>
        </div>

        <div class="half">
            <dl>
                <dt><label for="first_name_kana">名（カナ）</label></dt>
                <dd>{{ $customer->first_name_kana }}</dd>
            </dl>
        </div>

        <div>
            <dl>
                <dt><label for="tel">電話番号</label></dt>
                <dd>{{ $customer->tel }}</dd>
            </dl>
        </div>

        <div>
            <dl>
                <dt><label for="mail">メールアドレス</label></dt>
                <dd>{{ $customer->mail }}</dd>
            </dl>
        </div>

        <div>
            <dl>
                <dt><label for="remark">備考</label></dt>
                <dd>{{ $order->comment }}</dd>
            </dl>
        </div>

    </div>
    <a href="{{route('orders.edit',['id' => $order->id])}}"><button class="btn btn-primary" type="submit">編集</button></a>
    <a href="{{route('orders.index',['date' => $recieved_date->format('Y-m-d')])}}"><button class="btn btn-primary" type="submit">戻る</button></a>
</div>
@endsection
