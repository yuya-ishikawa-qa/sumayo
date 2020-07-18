@extends('layouts.app')

@section('content')
<div class="container">

  <div class="text-center mb-3">
    <h2>営業時間</h2>
  </div>

  <div class="row text-center mb-4">
    <div class="col">
      開店時間 :　　10 時 00 分
    </div>
  </div>

  <!-- 閉店時間 -->
  <div class="row text-center mb-4">
    <div class="col">
      閉店時間 :　　20 時 00 分
    </div>
  </div>

  <!-- 予約受入人数 -->
  <div class="row text-center mb-4">
    <div class="col">
    注文可能数 :　　10 [オーダー/時間]
    </div>
  </div>

  <!-- 最短受取可能時間 -->
  <div class="row text-center mb-4">
    <div class="col">
    最短受取可能時間 :　　60 分
    </div>
  </div>

    <!-- 編集ボタン -->
  <div class="row justify-content-center mt-5 mb-2">
    <a class="btn btn-primary text-center mr-3" href="/store/edit/time">編集画面</a>
    <a class="btn btn-secondary text-center"href="/store">戻る</a>
  </div>

@include('commons.footer')

@endsection