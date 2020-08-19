@extends('customer_layouts.customer_layouts')

@section('content')
@if(empty($flight_order->id))
<div class="confirm">
    <div class="text-center">
        <h3 class="login_title text-left d-inline-block mt-5">ご注文できませんでした。</h3>
    </div>
    <p>注文処理に失敗しました。<br>
        恐れ入りますが、最初からやり直してください。
    </p>
</div>
@else
<div class="confirm">
    <div class="text-center">
        <h3 class="login_title text-left d-inline-block mt-5">ご注文ありがとうございます。</h3>
    </div>
    <p>ご注文ありがとうございます。<br>
        @php
        printf('        あなたの注文番号は%08dです。<br>',$flight_order->id);
        @endphp
        ご入力いただいたメールアドレス宛に確認メールを送付しておりますので、併せてご確認ください。
    </p>
</div>
@endif
@endsection
