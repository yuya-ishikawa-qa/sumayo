@extends('layouts.app')
@section('content')
<div class="container">
<a href="{{ url('/stores')}}"><button class="btn btn-secondary btn-sm mb-2">戻る</button></a>
    <div class="row justify-content-center">
        <a class="btn btn-primary rounded-pill btn-lg col-10 mt-2 mb-2" href="{{ url('/items/register')}}" role="button">商品登録
        </a>
    </div>
    <h4 class="col-12 text-center mt-4 mb-1">商品一覧
    </h4>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">写真
            </th>
            <th scope="col">商品名
            </th>
            <th scope="col">価格
            </th>
            <th scope="col">販売
            <br>状況
            </th>
            <th scope="col">詳細
            </th>
        </tr>
        </thead>
        @isset($items)
        @foreach ($items as $item)
        <tbody>
        <tr>
            <th scope="row">
            <img src=
                @if ( $item->path == null) "/image/no_image.png" @else "{{$item->path}}" @endif
            class="img-fluid" alt="items_list_image" id="items_list_image">
            </th>
            <td>{{ $item->item_name }}
            </td>
            <td>&yen;{{ $item->price }}
            </td>
            <td> @if ( $item->is_selling == 0)販売中 @else 停止中 @endif
            </td>
            <td>
            <a href='/items/detail/{{$item->id}}'>詳細
            </a>
            </td>
        </tr>
        <tr>
        </tbody>
        @endforeach
        @endisset
    </table>
</div>
@endsection
