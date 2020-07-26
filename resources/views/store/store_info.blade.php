@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="text-center pt-2 mb-4">
      <h2>1.店舗情報</h2>
    </div>

    <div class="row text-center mb-4">
      <div class="col">
        店舗名 :　スマヨレストラン
      </div>
    </div>

    <div class="row text-center mb-4">
      <div class="col">
        電話番号 :　000-0000-0000
      </div>
    </div>

    <div class="row text-center mb-4">
      <div class="col">
        郵便番号 :　〒000-0000-0000
      </div>
    </div>

    <div class="row text-center mb-4">
      <div class="col">
        <p>住所 :　東京都 渋谷区 渋谷1丁目1-1</p> 
        <p>渋谷ハチ公前ビル1階</p>
      </div>
    </div>

    <div class="col text-center">
        店舗情報コメント
    </div> 
    <div class="justify-content-center ml-3 mr-3 mb-4">
        渋谷駅から徒歩5分の駅近です！センター街中にあります！
    </div>

    <div class="row justify-content-center mb-5">
      <a class="btn btn-primary text-center mr-2" href="/store/edit/info">編集画面</a>
      <a class="btn btn-secondary text-center" href="/store">戻る</a>
    </div>

  </div>

@endsection