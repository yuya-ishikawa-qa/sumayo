@extends('customer_layouts.customer_layouts')
    
@section('content')
{{--  この戻るボタンはあとで綺麗にする  --}}
    <button type="button" onclick="history.back()" class="ml-1">＜</button>

    <div class="container">
        <h1>カートの中身</h1>
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-3">
                    <img src="{{ asset('image/food_image/1678376_s.jpg') }}" class="card-img" alt="...">
                    </div>
                    <div class="col-9">
                    <div class="card-body">
                        <table>
                            <tr>
                            <td><p class="product-title">ナポリタン</p></td>
                            <td align="right"><p class="sale-price">&yen;700</p></td>
                            </tr>
                            <form action="" method="post"><table border="0" cellspacing="4" cellpadding="0">
                            <tr>
                            <td>数量<input name="cart" type="text" value="1" size="5"></td>
                            <td><input type="submit" value="変更"></td>
                            <td><input type="submit" value="削除"></td>
                            </tr>
                            </table>
                            <input type="hidden" name="cart" value="1">
                            </form>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-3">
                        <img src="{{ asset('image/food_image/karaage.jpg') }}" class="card-img" alt="...">
                    </div>
                    <div class="col-9">
                        <div class="card-body">
                            <table>
                                <tr>
                                <td><p class="product-title">唐揚げ</p></td>
                                <td align="right"><p class="sale-price">&yen;700</p></td>
                                </tr>
                                <form action="" method="post"><table border="0" cellspacing="4" cellpadding="0">
                                <tr>
                                <td>数量<input name="cart" type="text" value="1" size="5"></td>
                                <td><input type="submit" value="変更"></td>
                                <td><input type="submit" value="削除"></td>
                                </tr>
                                </table>
                                <input type="hidden" name="cart" value="1">
                                </form>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-0 mb-0">
                <div class="row no-gutters">
                    <div class="col-3">
                    </div>
                    <div class="col-9">
                        <div class="card-body" style="text-align:right;">
                        <p class="total-sales-price">合計金額</p>
                        <p class="total-sales-price">&yen;00000</p>
                        </div>
                    </div>
                </div>
            </div>


{{--  注文に進む  --}}
                <div class="col-12 mt-3" align="center">
                <a href="{{ url('/order_form')}}"><button class="btn btn-primary">注文手続き</button></a>
                </div>

{{--  formとsubmitでセッションに商品情報追加すること  --}}

        </div>


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
@endsection
