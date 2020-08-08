@extends('layouts.app')

@section('content')

  @if (session('flash_message'))
    <div class="text-center alert alert-success">
        {{ session('flash_message') }}
    </div>
  @endif

  <div class="container">
    <div class="text-center pt-2 mb-4">
      <h2>1.店舗情報</h2>
    </div>

    <div class="row text-center mb-4">
      <div class="col">
        店舗名 :　{{ $store->name }}
      </div>
    </div>

    <div class="row text-center mb-4">
      <div class="col">
        電話番号 :　{{ $store->phone }}
      </div>
    </div>

    <div class="row text-center mb-4">
      <div class="col">
        郵便番号 :　{{ $store->postcode }}
      </div>
    </div>

    <div class="row text-center mb-4">
      <div class="col">
        <p>住所 :　{{ $store->address }}</p>
      </div>
    </div>

    <div class="col text-center">
        店舗情報コメント
    </div> 
    <div class="text-center ml-3 mr-3 mb-4">
        {{ $store->comment }}
    </div>

    <div class="row justify-content-center mb-5">
      <a class="btn btn-primary text-center mr-2" href="{{ route('storeInfo.edit', ['id' => $store->id ]) }}">編集画面</a>
      <a class="btn btn-secondary text-center" href="{{ url('/stores') }}">戻る</a>
    </div>

  </div>

@endsection