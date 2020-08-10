@extends('layouts.app')

@section('content')
<div class="container">
  <div class="text-center pt-3 mb-4">
    <h2>店舗画像管理</h2>
  </div>

  <form action="{{ route('storeLogo.upload') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    @isset ($filename)
    <div>
        <img src="{{ asset('storage/' . $filename) }}">
    </div>
    @endisset

    <div class="form-group text-center mb-4">
      <label class="control-label">店舗ロゴ画像(サイト上部)</label>
      <div class="ml-5 pl-4">
        <input type="file" name="storelogo" />
      </div>
    </div>
 
    <div class="text-center mb-2">
      <input type="submit" value="送信" class="btn btn-primary">
    </div>
  </form>

  <div class="text-center">
    <a href="/stores"><button class="btn btn-secondary">戻る</button></a>
  </div>
</div>

@endsection