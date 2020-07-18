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

{{--  画像サイズ  --}}
        <style>
        img{
            max-width: 100%;
            height: auto;   
        }
        #top_image{
            max-width: 345px;
            height: 253px;   
        }

        ul{
        display: table;
        margin: 0 auto;
        padding: 0;
        width: 100%;
        text-align: center;
        }
        ul li{
        display: table-cell;
        min-width: 50px;
        }
        ul li a{
        display: block;
        width: 100%;
        padding: 10px 0;
        text-decoration: none;
        color: #555;
        font-weight: bold;
        }
        ul li.{
        background-color: #DEEBF7;
        }
        .category ul li a{
        color: #555;
        }
        ul li:hover{
        background-color: #FFF2CC;
        }

        </style>
       
    </head>
    <body>
       @include('commons.shop_header')

        <div class="container">
{{--  トップ画面スライドショー  --}}
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('image/food_image/3183082_s.jpg') }}" alt="First slide" id="top_image">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('image/food_image/1678376_s.jpg') }}"  alt="Second slide" id="top_image">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('image/food_image/2200690_s.jpg') }}"  alt="Third slide" id="top_image">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

{{--  お店情報  --}}

            <div class="container_shopinfo mt-3">
                <div class="row">
                    <h1 class="col-sm-12">スマヨレストラン</h1>
                    <p class="col-8 mb-0">営業時間  11:00-22:00</p>
                    <a href="{{ url('/shopinfo')}}" class="col-4">店舗詳細</a>
                    <p class="col-8 mt-0">今月の定休日 : 3日/5日/15日</p>
                </div>
            </div>

{{--  カテゴリー  --}}

            <nav>
                <ul class="category">
                    <li><a href="#1">パスタ</a></li>
                    <li><a href="#2">アラカルト</a></li>
                    <li><a href="#3">デザート</a></li>
                    <li><a href="#4">ドリンク</a></li>
                </ul>
            </nav>
           
{{--  商品一覧  --}}
            <div class="row">
                    <h3 class="col-12 mt-2" id="1">パスタ</h3>
                        <div class="col-6 col-sm-4 col-lg-3">
                            <a href="{{ url('/detail')}}" class="stretched-link">
                                <div class="card-body p-2">
                                    <a class="product-thumbnail d-block" href="single-product.html">
                                        <img class="mb-2" src="{{ asset('image/food_image/1678376_s.jpg') }}" alt=""></a>
                                    <p class="product-title mb-0">ナポリタン</p>
                                    <p class="sale-price mb-0">&yen;700</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3">
                            <a href="{{ url('/detail')}}" class="stretched-link">
                                <div class="card-body p-2">
                                    <a class="product-thumbnail d-block" href="single-product.html">
                                        <img class="mb-2" src="{{ asset('image/food_image/1678376_s.jpg') }}" alt=""></a>
                                    <p class="product-title mb-0">ナポリタン</p>
                                    <p class="sale-price mb-0">&yen;700</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3">
                            <a href="{{ url('/detail')}}" class="stretched-link">
                                <div class="card-body p-2">
                                    <a class="product-thumbnail d-block" href="single-product.html">
                                        <img class="mb-2" src="{{ asset('image/food_image/1678376_s.jpg') }}" alt=""></a>
                                    <p class="product-title mb-0">ナポリタン</p>
                                    <p class="sale-price mb-0">&yen;700</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3">
                            <a href="{{ url('/detail')}}" class="stretched-link">
                                <div class="card-body p-2">
                                    <a class="product-thumbnail d-block" href="single-product.html">
                                        <img class="mb-2" src="{{ asset('image/food_image/1678376_s.jpg') }}" alt=""></a>
                                    <p class="product-title mb-0">ナポリタン</p>
                                    <p class="sale-price mb-0">&yen;700</p>
                                </div>
                            </a>
                        </div>


                    {{--  foreachでカテゴリが変わった最初の商品にidをつける  --}}
                    <h3 class="col-12 mt-2" id="2">アラカルト</h3>
                        <div class="col-6 col-sm-4 col-lg-3" id="2">
                            <a href="{{ url('/detail')}}" class="stretched-link">
                                <div class="card-body p-2">
                                    <a class="product-thumbnail d-block" href="single-product.html">
                                        <img class="mb-2" src="{{ asset('image/food_image/karaage.jpg') }}" alt=""></a>
                                    <p class="product-title mb-0">唐揚げ</p>
                                    <p class="sale-price mb-0">&yen;700</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3">
                            <a href="{{ url('/detail')}}" class="stretched-link">
                                <div class="card-body p-2">
                                    <a class="product-thumbnail d-block" href="single-product.html">
                                        <img class="mb-2" src="{{ asset('image/food_image/karaage.jpg') }}" alt=""></a>
                                    <p class="product-title mb-0">唐揚げ</p>
                                    <p class="sale-price mb-0">&yen;700</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3" >
                            <a href="{{ url('/detail')}}" class="stretched-link">
                                <div class="card-body p-2">
                                    <a class="product-thumbnail d-block" href="single-product.html">
                                        <img class="mb-2" src="{{ asset('image/food_image/karaage.jpg') }}" alt=""></a>
                                    <p class="product-title mb-0">唐揚げ</p>
                                    <p class="sale-price mb-0">&yen;700</p>
                                </div>
                            </a>
                        </div>

        </div>
    </div>
            
@include('commons.shop_footer')



{{--  トップ画面のスライドショー用  --}}
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
</html>
