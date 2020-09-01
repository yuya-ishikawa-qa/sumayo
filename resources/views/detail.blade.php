@extends('customer_layouts.customer_layouts')

@section('content')

<a href="{{ url('/')}}">戻る</a>
{{--  商品画像  --}}
<div class="row justify-content-center">
    <div class="col-10 col-sm-10 col-lg-8">
        <div class="card-body p-2">
            <div class="embed-responsive embed-responsive-4by3" id="items_list_image">
            {{--  <img src=
                @if ( $item->path == null) "/storage/items/no_image.png" @else "/storage/items/{{$item->path}}" @endif
            class="justify-content-center card-img-top embed-responsive-item" alt="items_list_image" id="items_list_image">  --}}

            {{--  S3用  --}}
            <img src=
                @if ( $item->path == null) "/image/no_image.png" @else "{{$item->path}}" @endif
            class="justify-content-center card-img-top embed-responsive-item" alt="items_list_image" id="items_list_image">

            </div>
            <div class="col-12" style="color:red">{{ session('flash_message') }}</div>
            <div class="col-12 mt-2"><h3>{{ $item->item_name }}</h3></div>
            <div class="col-10"><p>{{ $item->description }}</p></div>
            <div class="col-10"><h5>&yen;{{ $item->price }}（税抜）</h5></div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <form action="{{route('cart.store',['get_id' => $item->id])}}" method="post">
            {{csrf_field()}}
            {{ method_field('POST')}}
            {{--  数量指定  --}}
            <div class="col-12" align="center" id="count">
                <button class="minus">－</button>
                <input type="text" name="quantity" value="0" readonly class="number">
                <button class="plus" type="button">＋</button>
            </div>

            {{--  カートに入れ、商品一覧に戻る  --}}
            <div class="col-12 mt-3" align="center">
                <button class="btn btn-primary" name="next_page" value="index">カートに入れ、商品一覧に戻る</button>
            </div>

            {{--  注文に進む  --}}
            <div class="col-12 mt-3" align="center">
                <button class="btn btn-primary" name="next_page" value="cart">注文に進む</button>
            </div>
        </form>
    </div>
</div>

{{--  数量変更の設定  --}}

    <script>
    $(function(){
        var number,total_numner;
        var max = 10; //合計最大数
        var $input = $('#count .number'); //カウントする箇所
        var $plus = $('#count .plus'); //アップボタン
        var $minus = $('#count .minus'); //ダウンボタン
        //合計カウント用関数
        function total() {
            total_numner = 0;
            $input.each(function(val) {
                val = Number($(this).val());
                total_numner += val;
            });
            return total_numner;
        }
        //ロード時
        $(window).on('load', function() {
            $input.each(function() {
                number = Number($(this).val());
                if (number == max) {
                    $(this).next($plus).prop("disabled", true);
                } else if (number == 0) {
                    $(this).prev($minus).prop("disabled", true);
                }
            });
            total();
            if (total_numner == max) {
                $plus.prop("disabled", true);
            } else {
                $plus.prop("disabled", false);
            }
        });
        //ダウンボタンクリック時
        $minus.on('click', function() {
            total();
            number = Number($(this).next($input).val());
            if (number > 0) {
                $(this).next($input).val(number - 1);
                if ((number - 1) == 0) {
                $(this).prop("disabled", true);
                }
                $(this).next().next($plus).prop("disabled", false);
            } else {
                $(this).prop("disabled", true);
            }
            total();
            if (total_numner < max) {
                $plus.prop("disabled", false);
            }
        });
        //アップボタンクリック時
        $plus.on('click', function() {
            number = Number($(this).prev($input).val());
            if (number < max) {
                $(this).prev($input).val(number + 1);
                if ((number + 1) == max) {
                $(this).prop("disabled", true);
                }
                $(this).prev().prev($minus).prop("disabled", false);
            } else {
                $(this).prop("disabled", true);
            }
            total();
            if (total_numner == max) {
                $plus.prop("disabled", true);
            } else {
                $plus.prop("disabled", false);
            }
        });
    });
    </script>


@endsection
