@extends('layouts.app')

@section('content')
<div class="container">

  <div class="text-center mb-3">
    <h2>店舗詳細管理</h2>
  </div>

  <form action="" method="post">
    {{ csrf_field() }}

    <!-- 店舗名 -->
    <div class="form-row mb-3">
      <label for="storename" class="col-xs-4 col-form-label ml-3 mr-2">店舗名</label>
      <div class="col">
        <input type="text" id="storename" name="storename" class="form-control">
      </div>
    </div>

    <!-- 電話番号 -->
    <div class="form-row mb-3">
      <label for="phone" class="col-xs-4 col-form-label ml-3 mr-2">電話番号</label>
      <div class="col">
        <input type="text" id="phone" name="phone1" class="form-control">
      </div>
      <div class="mt-2">
        <p>-</p>
      </div>
      <div class="col">
        <input type="text" id="phone" name="phone2" class="form-control">
      </div>
      <div class="mt-2">
        <p>-</p>
      </div>
      <div class="col">
        <input type="text" id="phone" name="phone3" class="form-control">
      </div>
    </div>

    <!-- 郵便番号 -->
    <div class="form-row mb-3">
      <label for="postalcode" class="col-xs-4 col-form-label ml-3 mr-2">郵便番号</label>
      <div class="col">
        <input type="text" id="postalcode1" name="postalcode" class="form-control">
      </div>
      <div class="mt-2">
        <p>-</p>
      </div>
      <div class="col">
        <input type="text" id="storename2" name="storename" class="form-control">
      </div>

    </div>

    <!-- 住所 (県)-->
    <div class="form-row mb-3">
      <label for="prefacture" class="col-xs-4 col-form-label ml-3 mr-2">都道府県</label>
      <div class="col">
        <input type="text" id="prefacture" name="prefacture" class="form-control">
      </div>
    </div>

    <!-- 住所 (市町村)-->
    <div class="form-row mb-3">
      <label for="city" class="col-xs-4 col-form-label ml-3 mr-2">市町村</label>
      <div class="col">
        <input type="text" id="city" name="city" class="form-control">
      </div>
    </div>

    <!-- 番地 -->
    <div class="form-row mb-3">
      <label for="district" class="col-xs-4 col-form-label ml-3 mr-2">番地</label>
      <div class="col">
        <input type="text" id="district" name="district" class="form-control">
      </div>
    </div>

    <!-- 建物名 -->
    <div class="form-row mb-3">
      <label for="building" class="col-xs-4 col-form-label ml-3 mr-2">建物名</label>
      <div class="col">
        <input type="text" id="building" name="building" class="form-control">
      </div>
    </div>


    <!-- 店舗説明用コメント -->
    <div class="form-group ml-3">
      <label for="store_comment">店舗説明用コメント</label>
      <textarea id="store_comment" class="form-control" rows="8"></textarea>
    </div>

    <!-- ボタン -->
    <div class="col text-center mt-3">
      <input type="submit" value="更新" class="btn btn-primary mr-3">
      <a href="/store" class="btn btn-dark">戻る</a>
    </div>
  </form>

  <div class="nav-bar">
    @include('commons.footer')  
  </div>

</div>


@endsection