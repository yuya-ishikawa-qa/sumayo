@extends('layouts.app')

@section('content')
<div class="container">

  <div class="text-center mb-3">
    <h2>店舗詳細管理</h2>
  </div>

  <form action="{{ route('storeInfo.update', ['id' => $store->id ]) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <!-- 店舗名 -->
    <div class="form-row mb-3">
      <label for="name" class="col-xs-4 col-form-label ml-3 mr-2">店舗名</label>
      <div class="col">
        <input type="text" id="name" name="name" class="form-control" value="{{ $store->name }}">
        @if($errors->has('name'))
          <div>
            <span class="text-danger">
              <strong>{{ $errors->first('name') }}</strong>
            </span>
          </div>
        @endif
      </div>
    </div>

    <!-- 電話番号 -->
    <div class="form-row mb-3">
      <label for="phone" class="col-xs-4 col-form-label ml-3 mr-2">電話番号</label>
      <div class="col">
        <input type="text" id="phone" name="phone" class="form-control" value="{{ $store->phone }}">
        @if($errors->has('phone'))
          <div>
            <span class="text-danger">
              <strong>{{ $errors->first('phone') }}</strong>
            </span>
          </div>
        @endif
      </div>
    </div>

    <!-- 郵便番号 -->
    <div class="form-row mb-3">
      <label for="postcode" class="col-xs-4 col-form-label ml-3 mr-2">郵便番号</label>
      <div class="col">
        <input type="text" id="postcode" name="postcode" class="form-control" value="{{ $store->postcode }}">
        @if($errors->has('postcode'))
          <div>
            <span class="text-danger">
              <strong>{{ $errors->first('postcode') }}</strong>
            </span>
          </div>
        @endif
      </div>
    </div>

    <!-- 住所 (県)-->
    <div class="form-row mb-3">
      <label for="address" class="col-xs-4 col-form-label ml-3 mr-2">都道府県</label>
      <div class="col">
        <input type="text" id="address" name="address" class="form-control" value="{{ $store->address }}">
        @if($errors->has('address'))
          <div>
            <span class="text-danger">
              <strong>{{ $errors->first('address') }}</strong>
            </span>
          </div>
        @endif
      </div>
    </div>

    <!-- 店舗説明用コメント -->
    <div class="form-group ml-3">
      <label for="comment">店舗説明用コメント</label>
      <textarea id="comment" class="form-control" name="comment" rows="8">{{$store->comment}}</textarea>
      @if($errors->has('comment'))
        <div>
          <span class="text-danger">
            <strong>{{ $errors->first('comment') }}</strong>
          </span>
        </div>
      @endif
    </div>

    <!-- ボタン -->
    <div class="col text-center mt-3">
      <input type="submit" value="更新" class="btn btn-primary mr-3">
      <a href="{{ route('storeInfo.show', ['id' => $store->id]) }}" class="btn btn-dark">戻る</a>
    </div>
  </form>

</div>


@endsection