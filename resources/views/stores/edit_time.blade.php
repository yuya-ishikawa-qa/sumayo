@extends('layouts.app')

@section('content')
<div class="container">

  <div class="text-center mb-3">
    <h2>営業時間管理</h2>
  </div>

  <form action="{{ route('storeTime.update', ['id' => $store->id ]) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <!-- 開始時間 -->
    <div class="form-row mb-2">
      <label for="start_time" class="col-xs-4 col-form-label ml-3 mr-2">開店時間</label>
      <div class="col">
        <input type="text" id="start_time" name="start_time" class="form-control" value="{{ substr($store->start_time, 0, 5) }}">
      </div>
    </div>

    <!-- 終了時間 -->
    <div class="form-row mb-2">
      <label for="start_time" class="col-xs-4 col-form-label ml-3 mr-2">閉店時間</label>
      <div class="col">
        <input type="text" id="start_time" name="start_time" class="form-control" value="{{ substr($store->end_time, 0, 5) }}">
      </div>
    </div>

    <!-- 予約受入人数 -->
    <div class="form-row mb-2">
      <label for="end_time" class="col-xs-4 col-form-label ml-3 mr-2">注文可能数</label>
      <div class="col">
        <input type="text" id="end_time" name="end_time" class="form-control" value="{{ $store->capacity }}">
      </div>
      <div class="col">
        <p class="mt-2 mr-3"> [件/時間]</p>
      </div>
    </div>

    <!-- 最短受取可能時間 -->
    <div class="form-row mb-2">
      <label for="earliest_receiveable_time" class="col-xs-4 col-form-label ml-3 mr-2">最短受取可能時間</label>
      <div class="col">
        <input type="text" id="earliest_receiveable_time" name="earliest_receiveable_time" class="form-control" value="{{ $store->earliest_receivable_time }}">
      </div>
      <div class="col">
        <p class="mt-2 mr-3"> 分</p>
      </div>
    </div>

    <!-- 編集ボタン -->
    <div class="col text-center mt-3">
      <input type="submit" value="更新" class="btn btn-primary">
      <a href="{{ url('/stores') }}" class="btn btn-secondary">戻る</a>
    </div>
  </form>
</div>

@endsection