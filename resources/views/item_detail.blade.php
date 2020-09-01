@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{ url('/stores')}}"><button class="btn btn-secondary btn-sm mb-2">戻る</button></a>
    <h2 class="text-center mt-2">商品詳細</h2>
    <div class="row">
        <div class="col-5 mx-auto d-block mb-2">
        <img src=
        @if ( $item->path == null) "/image/no_image.png" @else "{{$item->path}}" @endif id=item_detail_image class="mx-auto d-block" >
        </div>
    </div>


    <div class="row">
        <table class="table">
            <tbody>
                <tr>
                <th scope="row">商品名</th>
                <td>{{ $item->item_name }}</td>
                </tr>
                <tr>
                <tr>
                <th scope="row">商品カテゴリー</th>
                <td>
                @if( $item->item_category_id == 1) おすすめ
                @elseif( $item->item_category_id == 2) 単品
                @elseif( $item->item_category_id == 3) その他
                @elseif( $item->item_category_id == 4) ドリンク
                @endif
                </td>
                </tr>
                <tr>
                <th scope="row">商品説明</th>
                <td>{{ $item->description }}</td>
                </tr>
                <tr>
                <th scope="row">販売状況</th>
                <td>@if ( $item->is_selling == 0)販売中 @else 停止中 @endif</td>
                </tr>
                <tr>
                <th scope="row">価格</th>
                <td>&yen;{{ $item->price }}</td>
                </tr>
                <tr>
                <th scope="row">消費税</th>
                <td>{{ $item->tax }}%</td>
                </tr>
                <tr>
                <th scope="row">在庫数</th>
                    <td>
                    (月){{ $item->stock_monday }}
                    (火){{ $item->stock_tuesday }}
                    (水){{ $item->stock_wednesday }}<br>
                    (木){{ $item->stock_thursday }}
                    (金){{ $item->stock_friday }}
                    (土){{ $item->stock_saturday }}
                    (日){{ $item->stock_sunday }}
                </tr>
            </tbody>
        </table>

    </div>
    <div class="row justify-content-center">
        <a class="btn btn-primary rounded-pill btn-lg mb-3" href='/items/edit/{{$item->id}}' role="button">編集</a>
        <a class="col-2"></a>
            <form method="post" action="/items/destroy/{{$item->id}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" value="削除" class="btn btn-danger btn-lg rounded-pill btn-destroy">
        </form>

        <a href="{{ url('/items')}}" class="col-10 text-center mt-2">商品一覧に戻る</a>
    </div>
</div>

 {{--  削除確認アラート  --}}

<script>
$(function(){
    $('.btn-destroy').click(function(){
        if(confirm("本当に削除しますか？")){
            //そのままsubmit（削除）
        }else{
            //cancel
            return false;
        }
    });
});
</script>
@endsection
