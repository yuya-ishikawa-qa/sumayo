@extends('layouts.app')

@section('content')

<div class="container">

  <div class="col mt-3 mb-5">
    <h3>店員情報編集</h3>
  </div>

  @if (session('flash_message'))
  <div class="mb-5">
    <div class="alert alert-success" role="alert">
      {{ session('flash_message') }}
    </div>
  </div>
  @endif

  <form action="{{ route('users.updateName', ['id' => $user->id ]) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-group row mb-3 ml-3 mr-3 ">
      <label for="name" class="col-form-label">
        名前
      </label>
      <div class="col">
        <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
        @if ($errors->has('name'))
          <span role="alert" class="text-danger">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
		    @endif 
      </div>
      <div class=" mr-2 text-center">
        <input type="submit" class="btn btn-primary" value="名前変更">
      </div>
    </div>
  </form>

  <form action="{{ route('email.update', ['id' => $user->id ]) }}" method="POST" class="mt-5">
    {{ csrf_field() }}

    <div class="form-group row ml-3">
      <label for="staticEmail" class="col-xs-2 col-form-label">Email (現在)</label>
      <div class="col">
        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $user->email }}">
      </div>
    </div>
    <div class="form-group row ml-3">
      <label for="email" class="col-xs-2 col-form-label">Email (変更後)</label>
      <div class="col">
        <input type="email" id="email" name="new_email" class="form-control" placeholder="変更したいメールアドレス">
        @if ($errors->has('new_email'))
          <span role="alert" class="text-danger">
            <strong>{{ $errors->first('new_email') }}</strong>
          </span>
		    @endif
      </div>
    </div>
    <div class=" mr-2 text-center">
      <input type="submit" class="btn btn-primary" value="メールアドレス変更">
    </div>

  </form>


  <form action="{{ route('users.updatePassword', ['id' => $user->id ]) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-group ml-3 row mt-5">
      <label for="password" class="col-form-label">
        パスワード
      </label>
      <div class="col">
        <input type="password" id="password" name="password" class="form-control">
        @if ($errors->has('password'))
          <span role="alert" class="text-danger">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
		    @endif
      </div>
    </div>
    <div class=" mr-2 text-center">
      <input type="submit" class="btn btn-primary" value="パスワード変更">
    </div>
  </form>

  <div class="text-center mt-5">
    <a href="{{ url('/users') }}"><button class="btn btn-secondary">戻る</button></a>
  </div>


</div>

@endsection