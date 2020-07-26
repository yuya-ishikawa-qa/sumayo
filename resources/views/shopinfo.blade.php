@extends('customer_layouts.customer_layouts')
    
@section('content')

{{--  この戻るボタンはあとで綺麗にする  --}}
    <button type="button" onclick="history.back()" class="ml-1">＜</button>

{{--  グーグル地図？  --}}
    {{--  <div class="container">
        <div class="row">
            <div class="col-12">地図？お店側の管理画面で登録された住所から検索させてもの表示？
            自分の現在地必要？
            お店側が地図登録？？
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25905.27093518406!2d139.80356665!3d35.7468998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188e468ce2c5e7%3A0x5a36e348837a4538!2z44CSMTIwLTAwMzQg5p2x5Lqs6YO96Laz56uL5Yy65Y2D5L2P77yT5LiB55uu77yR!5e0!3m2!1sja!2sjp!4v1593820772466!5m2!1sja!2sjp" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>  --}}
            
{{--  お店情報  --}}
    <div class="container_shopinfo">
        <div class="row">
            <h1 class="col-12 mt-3 mb-3">スマヨレストラン</h1>
            <p class="col-4">営業時間</p>
            <p class="col-8">11:00-22:00</p>
            <p class="col-4">定休日</p>
            <p class="col-8">3日/5日/15日</p>
            <p class="col-4">住所</p>
            <p class="col-8">東京都千代田区丸の内１丁目</p>
            <p class="col-4">電話番号</p>
            <p class="col-8">03-****-****</p>
            <p class="col-4">コメント</p>
            <p class="col-8">〇〇駅徒歩5分。薬局の隣<p>
            
        </div>
    </div>
            


@endsection