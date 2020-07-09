@extends('layouts.app')

@section('content')
<div class="container">

  <div class="text-center mb-3">
    <h2>カテゴリ名管理</h2>
  </div>

  <form action="" method="post">
    {{ csrf_field() }}
    
    <!-- カテゴリ1 -->
    <div class="form-row mb-3">
      <label for="category1" class="col-xs-4 col-form-label ml-3 mr-2">カテゴリ名1</label>
      <div class="col">
        <input type="text" id="category1" name="category1" class="form-control">
      </div>
    </div>

    <!-- カテゴリ2 -->
    <div class="form-row mb-3">
      <label for="category2" class="col-xs-4 col-form-label ml-3 mr-2">カテゴリ名2</label>
      <div class="col">
        <input type="text" id="category2" name="category2" class="form-control">
      </div>
    </div>

    <!-- カテゴリ3 -->
    <div class="form-row mb-3">
      <label for="category3" class="col-xs-4 col-form-label ml-3 mr-2">カテゴリ名3</label>
      <div class="col">
        <input type="text" id="category3" name="category3" class="form-control">
      </div>
    </div>

    <!-- カテゴリ4 -->
    <div class="form-row mb-3">
      <label for="category4" class="col-xs-4 col-form-label ml-3 mr-2">カテゴリ名4</label>
      <div class="col">
        <input type="text" id="category4" name="category4" class="form-control">
      </div>
    </div>

    <!-- 送信ボタン -->
    <div class="col text-center mt-3">
      <input type="submit" value="更新" class="btn btn-primary">
    </div>
  </form>
</div>

@include('commons.footer')

@endsection