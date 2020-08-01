@extends('layouts.app')

@section('content')

<div class="container">

  <div class="col mt-3 mb-3">
    <h3>店員情報一覧</h3>
  </div>

  <div>
    <div class="alert "></div>
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
    @foreach ($users as $key => $user)
      <tr>
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
        @if( $user->id !== 1)
          <form action="{{ url('/users/{id}') }}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger">削除</button>
          </form>
        @endif  
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="text-center">
    <a href="/store"><button class="btn btn-secondary">戻る</button></a>
  </div>

</div>

@endsection