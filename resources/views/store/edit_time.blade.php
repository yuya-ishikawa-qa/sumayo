@extends('layouts.app')

@section('content')
<div class="container">

  <div class="text-center mb-3">
    <h2>営業時間管理</h2>
  </div>

  <form action="" method="post">
    {{ csrf_field() }}
    <!-- 開始時間 -->
    <div class="form-row">
      <label for="start_time" class="col-xs-4 col-form-label ml-3 mr-2">開店時間</label>
      <div class="col">
        <input type="text" id="start_time" name="start_time" class="form-control">
      </div>
      <p class="mt-2">時</p>
      
      <div class="col">
        <input type="text" id="start_time" name="start_time" class="form-control">
      </div>
      <p class="mt-2 mr-3">分</p>
    </div>

    <!-- 終了時間 -->
    <div class="form-row">
      <label for="start_time" class="col-xs-4 col-form-label ml-3 mr-2">開店時間</label>
      <div class="col">
        <input type="text" id="start_time" name="start_time" class="form-control">
      </div>
      <p class="mt-2">時</p>
      
      <div class="col">
        <input type="text" id="start_time" name="start_time" class="form-control">
      </div>
      <p class="mt-2 mr-3">分</p>
    </div>

    <!-- 予約受入人数 -->
    <div class="form-row">
      <label for="end_time" class="col-xs-4 col-form-label ml-3 mr-2">注文可能数</label>
      <div class="col">
        <input type="text" id="end_time" name="end_time" class="form-control">
      </div>
      <div class="col">
        <p class="mt-2 mr-3"> [件/時間]</p>
      </div>
    </div>

    <!-- 最短受取可能時間 -->
    <div class="form-row">
      <label for="earliest_receiveable_time" class="col-xs-4 col-form-label ml-3 mr-2">最短受取可能時間</label>
      <div class="col">
        <input type="text" id="earliest_receiveable_time" name="earliest_receiveable_time" class="form-control">
      </div>
      <div class="col">
        <p class="mt-2 mr-3"> 分</p>
      </div>
    </div>

    <!-- 編集ボタン -->
    <div class="col text-center mt-3">
      <input type="submit" value="更新" class="btn btn-primary">
      <a href="/store" class="btn btn-secondary">戻る</a>
    </div>
  </form>
</div>

@endsection