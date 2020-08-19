@php
$item_total = $tax_total = 0; #初期化
@endphp

@extends('customer_layouts.customer_layouts')

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
                @foreach(session()->get('cart') as $key => $value)
                @php
                $sub_total = 0;# 初期化

                # 商品取得
                $items = App\Items::find([$key]);
                foreach($items  as $v){
                $item = $v;
                }

                # 金額計算
                $sub_total = $item->price * $value;
                $item_total += $item->price * $value;
                $tax_total += $item->price * $item->tax / 100 * $value;
                @endphp
                <div class="item-list">
                    <div class="img"><div><img src="/storage/{{$item->path}}" alt="{{ $item->item_name }}"></div></div>
                    <div class="title">{{ $item->item_name }}</div>
                    <div class="price">&yen;{{ number_format($item->price) }}</div>
                    <div class="quantity">{{ $value }}個</div>
                    <div class="sub-total">&yen;{{ number_format($sub_total) }}</div>
                </div>
                @endforeach
                <dl>
                    <dt>商品小計</dt>
                    <dd>&yen;{{ number_format($item_total) }}</dd>
                    <dt>消費税</dt>
                    <dd>&yen;{{ number_format(ceil($tax_total)) }}</dd>
                    <dt>商品合計</dt>
                    <dd>&yen;{{ number_format($item_total + ceil($tax_total)) }}</dd>
                </dl>
            </div>

            <div class="form-area">

                <div>
                    <dl>
                        <dt>受取日</dt>
                        @php
                        $set_date = null; #初期化
                        $set_date = date_create(session()->get('order')['recieved_date']);
                        @endphp
                        <dd>{{$set_date->format('Y年m月d日')}}</dd>
                    </dl>
                </div>

                <div>
                    <dl>
                        <dt>受け取り時間</dt>
                        <dd>{{session()->get('order')['recieved_time']}}</dd>
                    </dl>
                </div>

                <div class="half">
                    <dl>
                        <dt>姓</dt>
                        <dd>{{session()->get('order')['last_name']}}</dd>
                    </dl>
                </div>

                <div class="half">
                    <dl>
                        <dt>名</dt>
                        <dd>{{session()->get('order')['first_name']}}</dd>
                    </dl>
                </div>

                <div class="half">
                    <dl>
                        <dt>姓（カナ）</dt>
                        <dd>{{session()->get('order')['last_name_kana']}}</dd>
                    </dl>
                </div>

                <div class="half">
                    <dl>
                        <dt>名（カナ）</dt>
                        <dd>{{session()->get('order')['first_name_kana']}}</dd>
                    </dl>
                </div>

                <div>
                    <dl>
                        <dt>電話番号</dt>
                        <dd>{{session()->get('order')['tel']}}</dd>
                    </dl>
                </div>

                <div>
                    <dl>
                        <dt>メールアドレス</dt>
                        <dd>{{session()->get('order')['mail']}}</dd>
                    </dl>
                </div>

                <div>
                    <dl>
                        <dt>備考</dt>
                        <dd>{{session()->get('order')['comment']}}</dd>
                    </dl>
                </div>

                <form action="{{route('buy.store')}}" method="post">
                    {{ csrf_field() }}
                    <button class="btn btn-primary" type="submit">注文する</button>
                </form>

                <div class="mt-2">
                    <a href="{{route('customerinfo.create')}}"><button class="btn btn-primary" type="submit">戻る</button></a>
                </div>
            </div>


        </div>
@endsection
