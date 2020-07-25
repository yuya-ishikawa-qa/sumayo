@extends('customer_layouts.customer_layouts')
    
@section('content')

        <main class="info-area">
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
                <div class="item-list">
                    <div class="img"><div><img src="{{ asset('img/IMG_1506-1.jpg') }}" alt=""></div></div>
                    <div class="title">唐揚げ弁当</div>
                    <div class="price">500円</div>
                    <div class="quantity">2個</div>
                    <div class="sub-total">1,000円</div>
                </div>
                <div class="item-list">
                    <div class="img"><div><img src="{{ asset('img/3P9A0329-560x373.jpg') }}" alt=""></div></div>
                    <div class="title">ハンバーグ弁当</div>
                    <div class="price">500円</div>
                    <div class="quantity">１個</div>
                    <div class="sub-total">500円</div>
                </div>
                <dl>
                    <dt>商品小計</dt>
                    <dd>1,500円</dd>
                    <dt>消費税</dt>
                    <dd>120円</dd>
                    <dt>商品合計</dt>
                    <dd>1,620円</dd>
                </dl>
            </div>

            <div class="form-area">

                <div>
                    <dl>
                        <dt>受取日</dt>
                        <dd>2020年8月1日</dd>
                    </dl>
                </div>

                <div>
                    <dl>
                        <dt>受け取り時間</dt>
                        <dd>11:00</dd>
                    </dl>
                </div>

                <div class="half">
                    <dl>
                        <dt><label for="last_name">姓</label></dt>
                        <dd>阪江</dd>
                    </dl>
                </div>

                <div class="half">
                    <dl>
                        <dt><label for="last_name">名</label></dt>
                        <dd>光希</dd>
                    </dl>
                </div>

                <div class="half">
                    <dl>
                        <dt>姓（カナ）</dt>
                        <dd>サカエ</dd>
                    </dl>
                </div>

                <div class="half">
                    <dl>
                        <dt><label for="first_name_kana">名（カナ）</label></dt>
                        <dd>ミキ</dd>
                    </dl>
                </div>

                <div>
                    <dl>
                        <dt><label for="tel">電話番号</label></dt>
                        <dd>0120-00-1111</dd>
                    </dl>
                </div>

                <div>
                    <dl>
                        <dt><label for="mail">メールアドレス</label></dt>
                        <dd>sample@sample.jp</dd>
                    </dl>
                </div>

                <div>
                    <dl>
                        <dt><label for="remark">備考</label></dt>
                        <dd>これはテストです</dd>
                    </dl>
                </div>
            </div>
            <a href="{!! url('/order_confirm'); !!}"><button class="btn btn-primary" type="submit">注文する</button></a>
            <a href="{!! url('/order_form'); !!}"><button class="btn btn-primary" type="submit">戻る</button></a>
        </main>
@endsection
