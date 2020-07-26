@extends('customer_layouts.customer_layouts')
    
@section('content')

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
                                    <a class="product-thumbnail d-block" href="{{ url('/detail')}}">
                                        <img  class="mb-2" src="{{ asset('image/food_image/1678376_s.jpg') }}" alt=""></a>
                                    <p class="product-title mb-0">ナポリタン</p>
                                    <p class="sale-price mb-0">&yen;700</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3">
                            <a href="{{ url('/detail')}}" class="stretched-link">
                                <div class="card-body p-2">
                                    <a class="product-thumbnail d-block" href="{{ url('/detail')}}">
                                        <img class="mb-2" src="{{ asset('image/food_image/1678376_s.jpg') }}" alt=""></a>
                                    <p class="product-title mb-0">ナポリタン</p>
                                    <p class="sale-price mb-0">&yen;700</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3">
                            <a href="{{ url('/detail')}}" class="stretched-link">
                                <div class="card-body p-2">
                                    <a class="product-thumbnail d-block" href="{{ url('/detail')}}">
                                        <img class="mb-2" src="{{ asset('image/food_image/1678376_s.jpg') }}" alt=""></a>
                                    <p class="product-title mb-0">ナポリタン</p>
                                    <p class="sale-price mb-0">&yen;700</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3">
                            <a href="{{ url('/detail')}}" class="stretched-link">
                                <div class="card-body p-2">
                                    <a class="product-thumbnail d-block" href="{{ url('/detail')}}">
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
                                    <a class="product-thumbnail d-block" href="{{ url('/detail')}}">
                                        <img class="mb-2" src="{{ asset('image/food_image/karaage.jpg') }}" alt=""></a>
                                    <p class="product-title mb-0">唐揚げ</p>
                                    <p class="sale-price mb-0">&yen;700</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3">
                            <a href="{{ url('/detail')}}" class="stretched-link">
                                <div class="card-body p-2">
                                    <a class="product-thumbnail d-block" href="{{ url('/detail')}}">
                                        <img class="mb-2" src="{{ asset('image/food_image/karaage.jpg') }}" alt=""></a>
                                    <p class="product-title mb-0">唐揚げ</p>
                                    <p class="sale-price mb-0">&yen;700</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3" >
                            <a href="{{ url('/detail')}}" class="stretched-link">
                                <div class="card-body p-2">
                                    <a class="product-thumbnail d-block" href="{{ url('/detail')}}">
                                        <img class="mb-2" src="{{ asset('image/food_image/karaage.jpg') }}" alt=""></a>
                                    <p class="product-title mb-0">唐揚げ</p>
                                    <p class="sale-price mb-0">&yen;700</p>
                                </div>
                            </a>
                        </div>

            </div>
    </div>

{{--  スライドショー用  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

{{--  カテゴリー移動  --}}
<script src="{{ asset('js/smooth_link.js') }}" defer></script>
            
@endsection