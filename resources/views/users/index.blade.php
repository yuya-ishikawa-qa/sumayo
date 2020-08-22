@extends('layouts.app')

@section('content')

<div class="container">

  <div class="col mt-3 mb-3">
    <h3>店員情報一覧</h3>
  </div>

  @if (session('flash_message'))
  <div class="mb-5">
    <div class="alert alert-success" role="alert">
      {{ session('flash_message') }}
    </div>
  </div>
  @endif

  <table class="table table-striped table-condensed">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">
          名前</br>
          メールアドレス
        </th>
        <th scope="col">
          
        </th>
        <th scope="col">
          
        </th>
      </tr>
    </thead>
    
    <tbody>

      @owner
      @foreach ($users as $key => $user)
      <tr>
        <!-- ID -->
        <th scope="row">
          <div class="d-flex align-items-center">
            {{ $user->id }}
          </div>
        </th>

        <!-- 名前 / メールアドレス -->
        <td>
          <div class="mb-2">
            {{ $user->name }}</br>
            {{ $user->email }}
          </div>
        </td>
        
        <!-- 編集ボタン -->
        <td>
          <a href="/users/{{ $user->id }}/edit"><button class="btn btn-primary">編集</button></a>
        </td>

        <!-- 店長は削除ボタン無し -->
        <td>
        @if( $user->id !== 1)
          <form action="/users/{{ $user->id }}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger">削除</button>
          </form>
        @endif
        </td>
        
      </tr>
      @endforeach
      @endowner

      @php
        $user = $users[0];
        $user_id = $user->id;
      @endphp

      <!-- ログイン中の店員の場合の表示 -->
      @if (Auth::check() && $user_id != 1)
      <tr>
        <!-- ID -->
        <th scope="row">
            <div class="d-flex align-items-center">
              {{ Auth::user()->id }}
            </div>
        </th>

        <!-- 名前 -->
        <td>
            <div class="mb-2">
              {{ Auth::user()->name }}
            </div>
        </td>

        <!-- メールアドレス -->
        <td>
            <div class="mb-2">
              {{ Auth::user()->email }}
            </div>
        </td>
        
        <!-- 編集ボタン -->
        <td>
            <a href="/users/{{ Auth::user()->id }}/edit"><button class="btn btn-primary">編集</button></a>
        </td>
      </tr>
      @endif
    </tbody>
  </table>

  <div class="text-center">
    <a href="/stores"><button class="btn btn-secondary">戻る</button></a>
  </div>

</div>

@endsection