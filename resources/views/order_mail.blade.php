@php
$item_total = $tax_total = 0; #初期化
@endphp

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="content-language" content="ja">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        @if(app('env') == 'production')
        <!-- Scripts -->
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <script src="{{ secure_asset('js/jquery-3.5.1.min.js') }}"></script>

        <!-- CSS -->
        <link href="{{ secure_asset('/css/customer.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        @else
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>

        <!-- CSS -->
        <link href="{{ asset('/css/customer.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @endif


    </head>
    <body>

        <div class="container">

            <div class="info-area">
                <div class="text-center">
                    <h3 class="login_title text-left d-inline-block mt-5">ご注文ありがとうございます</h3>
                </div>

                <p class="mt-3">
                    {{ $store->name }}です。<br>
                    この度はご注文ありがとうございます。<br>
                    以下の内容でご注文を受け付けました。
                </p>

                <div class="item-area mt-3">
                    <div class="item-list">
                        <div class="img"></div>
                        <div class="title">商品名</div>
                        <div class="price">単価</div>
                        <div class="quantity">数量</div>
                        <div class="sub-total">小計</div>
                    </div>
                    @foreach($item_list as $key => $value)
                    @php
                    $sub_total = 0;# 初期化

                    # 金額計算
                    $sub_total = $value['price'] * $value['quantity'];
                    $item_total += $value['price'] * $value['quantity'];
                    $tax_total += $value['price'] * $value['tax'] / 100 * $value['quantity'];
                    @endphp
                    <div class="item-list">
                        <div class="img">
                            <div>
                                @if ( empty($value['image']) )
                                <img src="/image/no_image.png" alt="{{ $value['item_name'] }}">
                                @else
                                <img src="{{ $value['image'] }}" alt="{{ $value['item_name'] }}">
                                @endif
                            </div>
                        </div>
                        <div class="title">{{ $value['item_name'] }}</div>
                        <div class="price">&yen;{{ number_format($value['price']) }}</div>
                        <div class="quantity">{{ $value['quantity'] }}個</div>
                        <div class="sub-total">&yen;{{ number_format($sub_total) }}</div>
                    </div>
                    @endforeach
                    <dl>
                        <dt>商品小計</dt>
                        <dd>&yen;{{ number_format($item_total) }}</dd>
                        <dt>消費税</dt>
                        <dd>&yen;{{ number_format(ceil($tax_total)) }}</dd>
                        <dt>商品合計</dt>
                        <dd>&yen;{{ $flight_order->order_total_price }}</dd>
                    </dl>
                </div>

                <div class="form-area">

                    <div>
                        <dl>
                            <dt>受取日</dt>
                            @php
                            $set_date = null; #初期化
                            $set_date = date_create(sprintf('%s %s',$flight_order->recieved_date,$flight_order->recieved_time));
                            @endphp
                            <dd>{{$set_date->format('Y年m月d日')}}</dd>
                        </dl>
                    </div>

                    <div>
                        <dl>
                            <dt>注文番号</dt>
                            <dd>{{sprintf('%08d',$flight_order->id)}}</dd>
                        </dl>
                    </div>

                    <div>
                        <dl>
                            <dt>受取時間</dt>
                            <dd>{{$set_date->format('H:i')}}</dd>
                        </dl>
                    </div>

                    <div class="half">
                        <dl>
                            <dt>姓</dt>
                            <dd>{{$flight_customer->last_name}}</dd>
                        </dl>
                    </div>

                    <div class="half">
                        <dl>
                            <dt>名</dt>
                            <dd>{{$flight_customer->first_name}}</dd>
                        </dl>
                    </div>

                    <div class="half">
                        <dl>
                            <dt>姓（カナ）</dt>
                            <dd>{{$flight_customer->last_name_kana}}</dd>
                        </dl>
                    </div>

                    <div class="half">
                        <dl>
                            <dt>名（カナ）</dt>
                            <dd>{{$flight_customer->first_name_kana}}</dd>
                        </dl>
                    </div>

                    <div>
                        <dl>
                            <dt>電話番号</dt>
                            <dd>{{$flight_customer->tel}}</dd>
                        </dl>
                    </div>

                    <div>
                        <dl>
                            <dt>メールアドレス</dt>
                            <dd>{{$flight_customer->mail}}</dd>
                        </dl>
                    </div>

                    <div>
                        <dl>
                            <dt>備考</dt>
                            <dd>{{$flight_order->comment}}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
