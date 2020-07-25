@extends('layouts.app')

@section('content')
<div class="container">

  <div class="text-center pt-3 mb-4">
    <h2>オススメ商品画像</h2>
  </div>

  <form action="" method="post">
    {{ csrf_field() }}
    
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
      <a href="/store"><button class="btn btn-secondary">戻る</button></a>
    </div>

  </form>
</div>

<div class="navbar">
  @include('commons.footer')
</div>

@endsection