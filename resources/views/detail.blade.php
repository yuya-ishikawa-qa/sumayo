<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>sumayo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        {{--  Bootstrap  --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    </head>
        <style>
        a {
           text-decoration: none;
            color: #555;
          }
        </style>



    <body>
       @include('commons.shop_header')
        <button type="button" onclick="history.back()" class="ml-1">＜</button>

{{--  商品画像  --}}
        <div class="container">
            <div class="row">
            
                <img class="col-10 mb-2 img-fluid mx-auto d-block" src="{{ asset('image/food_image/1678376_s.jpg') }}" alt=""></a>

                <div class="product-title col-10"><h1>ナポリタン</h1></div>
                <div class="product-description col-8"><p>昔懐かしのナポリタン</p></div>
                <div class="sale-price col-4"><p>&yen;700</p></div>
            

{{--  数量指定  --}}
                <div class="col-12" align="center" id="count">


                    
                    <button class="minus">－</button>
                    <input type="text" name="quantity" value="0" readonly class="number">
                    <button class="plus">＋</button>

               	</div>



{{--  カートに入れ、商品一覧に戻る  --}}
                <div class="col-12 mt-3" align="center">
                    <button class="btn btn-primary" onclick="location.href='/'">カートに入れ、商品一覧に戻る</button>
                </div>

{{--  注文に進む  --}}
                <div class="col-12 mt-3" align="center">
                    <button class="btn btn-primary" onclick="location.href='/cart'">注文に進む</button>
                </div>

{{--  formとsubmitでセッションに商品情報追加すること  --}}

            </div>
        </div>

       @include('commons.shop_footer')






{{--  数量変更の設定  --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
    </body>
</html>
