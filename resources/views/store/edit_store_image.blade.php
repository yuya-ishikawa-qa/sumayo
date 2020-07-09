@extends('layouts.app')

@section('content')
<div class="container">

  <div class="text-center pt-3 mb-4">
    <h2>店舗画像管理</h2>
  </div>

  <form action="" method="post">
    {{ csrf_field() }}
    <!-- 開始時間 -->

    <div class="form-group text-center mb-4">
      <label class="control-label">店舗ロゴ画像(サイト上部)</label>
      <div class="ml-5 pl-4">
        <input type="file" name="storelogo" />
      </div>
    </div>
    

    <div class="form-group text-center mb-4">
      <label class="control-label">オススメ商品画像1</label>
      <div class="ml-5 pl-4">
        <input type="file" name="slider_image1" />
      </div>
    </div>

    <div class="form-group text-center mb-4">
      <label class="control-label">オススメ商品画像2</label>
      <div class="ml-5 pl-4">
        <input type="file" name="slider_image2" />
      </div>
    </div>

    <div class="form-group text-center mb-4">
      <label class="control-label">オススメ商品画像3</label>
      <div class="ml-5 pl-4">
        <input type="file" name="slider_image3" />
      </div>
    </div>

    <div class="text-center mb-4">
      <input type="submit" value="送信" class="btn btn-primary">
    </div>

  </form>
</div>

<div class="navbar">
  @include('commons.footer')
</div>

@endsection