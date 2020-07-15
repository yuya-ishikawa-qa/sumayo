@extends('layouts.app')

@section('content')

<div class="container">

  <div class="col mt-3 mb-3">
    <h3>店員情報一覧</h3>
  </div>

  <table class="table table-striped table-condensed">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">
          名前
        </th>
      </tr>
    </thead>
    
    <tbody>
      <tr>
      @foreach ($users as $key => $user)
        <th scope="row">
          <div class="d-flex align-items-center">
            {{ $user->id }}
          </div>
        </td>
        <td>
          <p class="mb-2">
            {{ $user->name }}
          </p>
        </td>
        <td>
          <a href="/users/{{ $user->id }}/edit"><button class="btn btn-primary">編集</button></a> 
        </td>

        <!-- 店長は削除ボタン無し -->
        <td>
          <form action="/users/delete" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger">削除</button>
          </form>
          
        </td>
      @endforeach
      </tr>
    </tbody>
  </table>

  <div class="text-center">
    <a href="/store"><button class="btn btn-secondary">戻る</button></a>
  </div>

</div>

@include('commons.footer')

@endsection