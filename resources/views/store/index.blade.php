@extends('layouts.app')

@section('content')

<div class="container">

  <div class="text-center pt-2 mb-4">
    <h2>店舗管理画面TOP</h2>
  </div>

  <div class="text-left pt-2 mb-4">
    <h4>1.予約管理</h4>
  </div>

  <div class="card-group">
    <div class="card border-primary text-center" style="width: 10rem;">
      <div class="card-body">
        <h6 class="card-title">注文予約一覧</h6>
        <p class="card-text"></p>
        <a href="#" class="btn btn-primary">表示</a>
      </div>
    </div>
    
    <div class="card border-primary text-center" style="width: 10rem;">
      <div class="card-body">
        <h6 class="card-title">過去注文履歴</h6>
        <p class="card-text"></p>
        <a href="#" class="btn btn-primary">表示</a>
      </div>
    </div>
  </div>

  <div class="text-left mt-4 mb-4">
    <h4>2.商品管理</h4>
  </div>

  <div class="card-group">
    <div class="card border-primary text-center" style="width: 10rem;">
      <div class="card-body">
        <h6 class="card-title">商品一覧</h6>
        <p class="card-text"></p>
        <a href="#" class="btn btn-primary">表示</a>
      </div>
    </div>


    <div class="card border-primary text-center" class="pl-5" style="width: 10rem;">
      <div class="card-body">
        <h6 class="card-title">商品登録</h6>
        <p class="card-text"></p>
        <a href="#" class="btn btn-primary">登録画面へ</a>
      </div>
    </div>
  </div>

  <div class="text-left mt-4 mb-4">
    <h4>3.店舗管理</h4>
  </div>

  <div class="card-group">
    <div class="card border-primary text-center" class="pl-5" style="width: 10rem;">
      <div class="card-body">
        <h6 class="card-title">店舗情報</h6>
        <p class="card-text"></p>
        <a href="/store/info" class="btn btn-primary">表示</a>
      </div>
    </div>

    <div class="card border-primary text-center" style="width: 10rem;">
      <div class="card-body">
        <h6 class="card-title">店舗営業時間</h6>
        <p class="card-text"></p>
        <a href="/store/time" class="btn btn-primary">表示</a>
      </div>
    </div>
  </div>

  <div class="card-group">
    <div class="card border-primary text-center" style="width: 10rem;">
      <div class="card-body">
        <h6 class="card-title">休日カレンダー</h6>
        <p class="card-text"></p>
        <a href="/store/holiday" class="btn btn-primary">表示</a>
      </div>
    </div>
  </div>

  <div class="text-left mt-4 mb-4">
    <h4>4.スタッフアカウント管理</h4>
  </div>

  <div class="card-group">
    <div class="card border-primary text-center" class="pl-5" style="width: 10rem;">
      <div class="card-body">
        <h6 class="card-title">スタッフ一覧</h6>
        <p class="card-text"></p>
        <a href="/users" class="btn btn-primary">表示</a>
      </div>
    </div>

    <div class="card border-primary text-center" style="width: 10rem;">
      <div class="card-body">
        <h6 class="card-title">新規スタッフ登録</h6>
        <p class="card-text"></p>
        <a href="#" class="btn btn-primary">登録画面へ</a>
      </div>
    </div>
  </div>

  <div class="text-left mt-4 mb-4">
    <h4>5.画像管理</h4>
  </div>

  <div class="card-group">
    <div class="card border-primary text-center" style="width: 10rem;">
      <div class="card-body">
        <h6 class="card-title">お店ロゴ画像</h6>
        <p class="card-text"></p>
        <a href="/store/edit/logo" class="btn btn-primary">登録画面へ</a>
      </div>
    </div>

    <div class="card border-primary text-center" style="width: 10rem;">
      <div class="card-body">
        <h6 class="card-title">オススメ商品画像</h6>
        <p class="card-text"></p>
        <a href="/store/edit/images" class="btn btn-primary">登録画面へ</a>
      </div>
    </div>
  </div>
</div>
@endsection


