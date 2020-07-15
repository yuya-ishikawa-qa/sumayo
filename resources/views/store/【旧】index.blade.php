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
    <a class="btn btn-primary text-center" href="/store/edit_store_info">店舗情報編集画面へ</a>
  </div>

  <div class="text-center pt-2 mb-4">
    <h2>2.営業時間</h2>
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
    <a class="btn btn-primary text-center" href="/store/edit_time">営業時間編集画面へ</a>
  </div>

  <!-- カレンダー -->

  <div class="text-center mt-5">
    <h2>3.休日カレンダー</h2>
  </div>

  <h5 class="col text-center">
    6月
  </h5>

  <table class="col text-center">
    <tr>
      <th>日</th>
      <th>月</th>
      <th>火</th>
      <th>水</th>
      <th>木</th>
      <th>金</th>
      <th>土</th>
    </tr>

    <tr>
    @for ($i=1; $i<=7; $i++)
      <td>
        {{ $i }}
      </td>
    @endfor
    </tr>

    <tr>
      @for ($i=8; $i<=14; $i++)
        <td>
          {{ $i }}
        </td>
      @endfor
    </tr>

    <tr>
      @for ($i=15; $i<=21; $i++)
        <td>
          {{ $i }}
        </td>
      @endfor
    </tr>

    <tr>
      @for ($i=22; $i<=28; $i++)
        <td>
          {{ $i }}
        </td>
      @endfor
    </tr>

    <tr>
      @for ($i=29; $i<=30; $i++)
        <td>
          {{ $i }}
        </td>
      @endfor
    </tr>
    
  </table>

  <h5 class="col text-center">
    7月
  </h5>

  <table class="col text-center">
    <tr>
      <th>日</th>
      <th>月</th>
      <th>火</th>
      <th>水</th>
      <th>木</th>
      <th>金</th>
      <th>土</th>
    </tr>

    <tr>
    @for ($i=1; $i<=7; $i++)
      <td>
        {{ $i }}
      </td>
    @endfor
    </tr>

    <tr>
      @for ($i=8; $i<=14; $i++)
        <td>
          {{ $i }}
        </td>
      @endfor
    </tr>

    <tr>
      @for ($i=15; $i<=21; $i++)
        <td>
          {{ $i }}
        </td>
      @endfor
    </tr>

    <tr>
      @for ($i=22; $i<=28; $i++)
        <td>
          {{ $i }}
        </td>
      @endfor
    </tr>

    <tr>
      @for ($i=29; $i<=30; $i++)
        <td>
          {{ $i }}
        </td>
      @endfor
    </tr>
    
  </table>
  
  <div class="col text-center mt-3">
    <a href="/store/edit_holiday" class="btn btn-primary">休日設定画面へ</a>
  </div>
</div>

<div class="nav-bar">
  @include('commons.footer')
</div>


@endsection


