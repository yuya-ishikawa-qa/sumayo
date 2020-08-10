@extends('layouts.app')

@section('content')
<div class="container">

  <div class="text-center pt-3 mb-4">
    <h2>店舗ロゴ</h2>
  </div>

  @if (session('flash_message'))
  <div class="mb-5">
    <div class="alert alert-success" role="alert">
      {{ session('flash_message') }}
    </div>
  </div>
  @endif

  <div class="mt-3 mb-3">
    <div class="text-center">
        @isset ($store->logo)
            <div class="border border-primary rounded pt-2 pb-2 pr-2 pl-2 ">
            <div class="col mb-2">
                <strong><u>アップロード済ロゴ画像</u></strong>
            </div>
            <div class="col">
                <img src="/storage/storeLogo/{{$store->logo}}" alt="画像が読み込めません">
            </div>
            </div>
        @else
            <!-- No image画像 -->
            <div class="border border-danger rounded pt-2 pb-2 pr-2 pl-2 ">
            <div class="col mb-2">
                <strong class="text-danger"><u>ロゴ画像アップロード未完了</u></strong>
            </div>
            <div class="col">
                <img src="/storage/storeLogo/noimage.jpg" alt="画像が読み込めません">
            </div>
            </div>
                    @endisset
        
    </div>
  </div>


  <form action="{{ route('storeLogo.upload', ['id' => $store->id] ) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group text-center mt-5 mb-4">
      <label class="control-label">店舗ロゴ画像(サイト上部)</label>
      <div class="ml-5 pl-4">
        <input type="file" name="logo">
      </div>
      <span class="text-danger">
            <strong>{{ $errors->first('logo') }}</strong>
        </span>
    </div>
 
    <div class="text-center mb-4">
      <input type="submit" value="送信" class="btn btn-primary">
    </div>
  </form>

<div class="text-center">
  <a href="/stores"><button class="btn btn-secondary">戻る</button></a>
</div>

</div>

@endsection