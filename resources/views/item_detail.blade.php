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


        <!-- ＃リンクのスムーズスクロール -->
        <script>
        $(function(){
            // #で始まるリンクをクリックしたら実行されます
            $('a[href^="#"]').click(function() {
            // スクロールの速度
            var speed = 400; // ミリ秒で記述
            var href= $(this).attr("href");
            var target = $(href == "#" || href == "" ? 'html' : href);
            var position = target.offset().top;
            $('body,html').animate({scrollTop:position}, speed, 'swing');
            return false;
            });
        });
        </script>

       
        <style>
        img{
            max-width: 100%;
            height: auto;   
        }
        </style>
       
    </head>
    <body>
        ヘッダーあとで追加＠include("commons.header")


        <div class="container">
            <h2 class="text-center mt-2">商品詳細</h2>
            <div class="row">
                <div class="col-4">
                    <img src="{{ asset('image/food_image/1678376_s.jpg') }}" alt="">
                    <p class="text-center">写真1</p>
                </div>
                <div class="col-4">
                    <img src="{{ asset('image/food_image/1678376_s.jpg') }}" alt="">
                    <p class="text-center">写真2</p>
                </div>
                <div class="col-4">
                    <img src="{{ asset('image/food_image/1678376_s.jpg') }}" alt="">
                    <p class="text-center">写真3</p>
                </div>
            </div>


            <div class="row">

                <img src="image/food_image/1678376_s.jpg" alt="">

                <table class="table">
                    <tbody>
                        <tr>
                        <th scope="row">商品名</th>
                        <td>ナポリタン</td>
                        </tr>
                        <tr>
                        <th scope="row">商品説明</th>
                        <td>昔ながらのナポリタン</td>
                        </tr>
                        <tr>
                        <th scope="row">販売状況</th>
                        <td>販売中</td>
                        </tr>
                        <tr>
                        <th scope="row">価格</th>
                        <td>&yen;700</td>
                        </tr>
                        <tr>
                        <th scope="row">販売状況</th>
                        <td>販売中</td>
                        </tr>
                        <tr>
                        <th scope="row">消費税</th>
                        <td>10%</td>
                        </tr>
                        <tr>
                        <th scope="row">在庫数</th>
                        <td>20</td>
                        </tr>
                        <tr>
                        <th scope="row">販売曜日</th>
                        <td>月、火、水、木、金</td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="row justify-content-center">
                <a class="btn btn-secondary rounded-pill btn-lg col-5" href="{{ url('/items/detail/edit')}}" role="button">編集</a>
                <a href="" class="col-1"></a>
                <a class="btn btn-danger rounded-pill btn-lg col-5" href="#" role="button">削除</a>

                {{--  削除確認アラートあとで追加  --}}

                <a href="{{ url('/items')}}" class="col-6 text-center mt-4">商品一覧に戻る</a>
            </div>
        </div>


            




        
        フッターあとで追加＠include("commons.footer")





    </body>
</html>