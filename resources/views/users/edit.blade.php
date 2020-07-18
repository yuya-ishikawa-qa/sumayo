@extends('layouts.app')

@section('content')

<div class="container">

  <div class="col mt-3 mb-5">
    <h3>店員情報編集</h3>
  </div>

  <form action="/users/{{$user->id}}/update" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <div class="form-group row mb-3">
      <label for="name" class="col col-form-label">
        名前
      </label>
      <div class="col">
        <input type="text" id="name" name="name" value="{{ $user->name }}">
      </div>
    </div>

    <div class="form-group row mb-3">
      <label for="name" class="col col-form-label">
        メールアドレス
      </label>
      <div class="col">
        <input type="email" id="name" name="name" value="{{ $user->email }}">
      </div>
    </div>

    <div class="form-group row mb-3">
      <label for="password" class="col col-form-label">
        パスワード
      </label>
      <div class="col">
        <input type="password" id="password" name="password">
      </div>
    </div>

    <div class="fom-group row mt-5">
      <div class="col text-center">
        <input type="submit" class="btn btn-primary" value="更新">
        <a href="/users"><button class="btn btn-secondary">戻る</button></a>
      </div>
    </div>
  </form>

</div>

@include('commons.footer')

@endsection