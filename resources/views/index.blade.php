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
            @foreach ($store as $store)
                    <h1 class="col-sm-12">{{ $store->name }}</h1>
                    <p class="col-8 mb-0">営業時間  {{ $store->start_time }}-{{ $store->end_time }}</p>
                    <a href="{{ url('/shopinfo')}}" class="col-4">店舗詳細</a>
                    {{--  <p class="col-8 mt-0">今月の定休日 : 3日/5日/15日</p>  --}}
                    @endforeach
                </div>
            </div>

{{--  カテゴリー  --}}
            <nav class="mt-3">
                <ul class="category">
                    <li><a href="#1">おすすめ</a></li>
                    <li><a href="#2">単品</a></li>
                    <li><a href="#3">その他</a></li>
                    <li><a href="#4">ドリンク</a></li>
                </ul>
            </nav>
           
{{--  商品一覧  --}}
            <div class="row mt-3">
            @isset($items)

            @php $i = 1 @endphp
            @while ($i < 5)
            @foreach ($items as $item)
          
            @if($item->item_category_id == 1)<h3 class="col-12 mt-2" id="1">おすすめ</h3>@endif
            @if($item->item_category_id == 2)<h3 class="col-12 mt-2" id="2">a</h3>@endif
            @if($item->item_category_id == 3)<h3 class="col-12 mt-2" id="3">v</h3>@endif
            @if($item->item_category_id == 4)<h3 class="col-12 mt-2" id="4">r</h3>@endif
            @break
            @endforeach

            @foreach ($items as $item)
            @if($item->item_category_id == $i)
            <div class="col-6 col-sm-4 col-lg-3">
                <a class="stretched-link">
                <div class="card-body p-2">
                    <a class="product-thumbnail d-block" href='/detail/{{$item->id}}'>
                    <img src=
                        @if ( $item->path == null) "/storage/items/no_image.png" @else "/storage/{{$item->path}}" @endif
                    class="img-fluid" alt="items_list_image" id="items_list_image">
                    </a>
                    <p class="product-title mb-0">{{ $item->item_name }}
                    </p>
                    <p class="sale-price mb-0">&yen;{{ $item->price }}
                    </p>
                </div>
                </a>
            </div>
            @endif
            @endforeach
            @php $i++ @endphp
            @endwhile

            @endisset
            {{--  @isset($items)

            
            {{$i = 1}}
            @while ($i < 5)
          
            @foreach ($items as $item)
            @if($item->item_category_id == 1)<h3 class="col-12 mt-2" id="1">おすすめ</h3>@endif
            @if($item->item_category_id == 2)<h3 class="col-12 mt-2" id="2">a</h3>@endif
            @if($item->item_category_id == 3)<h3 class="col-12 mt-2" id="3">v</h3>@endif
            @if($item->item_category_id == 4)<h3 class="col-12 mt-2" id="4">r</h3>@endif
            @break
            @endforeach

            @foreach ($items as $item)
            @if($item->item_category_id == $i)
            <div class="col-6 col-sm-4 col-lg-3">
                <a class="stretched-link">
                <div class="card-body p-2">
                    <a class="product-thumbnail d-block" href='/detail/{{$item->id}}'>
                    <img src=
                        @if ( $item->path == null) "/storage/items/no_image.png" @else "/storage/{{$item->path}}" @endif
                    class="img-fluid" alt="items_list_image" id="items_list_image">
                    </a>
                    <p class="product-title mb-0">{{ $item->item_name }}
                    </p>
                    <p class="sale-price mb-0">&yen;{{ $item->price }}
                    </p>
                </div>
                </a>
            </div>
            @endif
            @endforeach
            {{$i++}}
            @endwhile

            @endisset  --}}

            {{--  <div class="row">
            @isset($items)
            <h3 class="col-12 mt-2" id="2">単品</h3>
            @foreach ($items as $item)
            @if($item->item_category_id == 2)
            <div class="col-6 col-sm-4 col-lg-3">
                <a class="stretched-link">
                <div class="card-body p-2">
                    <a class="product-thumbnail d-block" href='/detail/{{$item->id}}'>
                    <img src=
                        @if ( $item->path == null) "/storage/items/no_image.png" @else "/storage/{{$item->path}}" @endif
                    class="img-fluid" alt="items_list_image" id="items_list_image">
                    </a>
                    <p class="product-title mb-0">{{ $item->item_name }}
                    </p>
                    <p class="sale-price mb-0">&yen;{{ $item->price }}
                    </p>
                </div>
                </a>
            </div>
            @endif
            @endforeach
            @endisset
            <div class="row">
            @isset($items)
            <h3 class="col-12 mt-2" id="3">その他</h3>
            @foreach ($items as $item)
            @if($item->item_category_id == 3)
            <div class="col-6 col-sm-4 col-lg-3">
                <a class="stretched-link">
                <div class="card-body p-2">
                    <a class="product-thumbnail d-block" href='/detail/{{$item->id}}'>
                    <img src=
                        @if ( $item->path == null) "/storage/items/no_image.png" @else "/storage/{{$item->path}}" @endif
                    class="img-fluid" alt="items_list_image" id="items_list_image">
                    </a>
                    <p class="product-title mb-0">{{ $item->item_name }}
                    </p>
                    <p class="sale-price mb-0">&yen;{{ $item->price }}
                    </p>
                </div>
                </a>
            </div>
            @endif
            @endforeach
            @endisset
            <div class="row">
            @isset($items)
            <h3 class="col-12 mt-2" id="4">ドリンク</h3>
            @foreach ($items as $item)
            @if($item->item_category_id == 4)
            <div class="col-6 col-sm-4 col-lg-3">
                <a class="stretched-link">
                <div class="card-body p-2">
                    <a class="product-thumbnail d-block" href='/detail/{{$item->id}}'>
                    <img src=
                        @if ( $item->path == null) "/storage/items/no_image.png" @else "/storage/{{$item->path}}" @endif
                    class="img-fluid" alt="items_list_image" id="items_list_image">
                    </a>
                    <p class="product-title mb-0">{{ $item->item_name }}
                    </p>
                    <p class="sale-price mb-0">&yen;{{ $item->price }}
                    </p>
                </div>
                </a>
            </div>
            @endif
            @endforeach
            @endisset
            <div class="row">
            @isset($items)
            <h3 class="col-12 mt-2" id="1">その他</h3>
            @foreach ($items as $item)
            @if($item->item_category_id == 0)
            <div class="col-6 col-sm-4 col-lg-3">
                <a class="stretched-link">
                <div class="card-body p-2">
                    <a class="product-thumbnail d-block" href='/detail/{{$item->id}}'>
                    <img src=
                        @if ( $item->path == null) "/storage/items/no_image.png" @else "/storage/{{$item->path}}" @endif
                    class="img-fluid" alt="items_list_image" id="items_list_image">
                    </a>
                    <p class="product-title mb-0">{{ $item->item_name }}
                    </p>
                    <p class="sale-price mb-0">&yen;{{ $item->price }}
                    </p>
                </div>
                </a>
            </div>
            @endif
            @endforeach
            @endisset  --}}

            

            </div>
    </div>

{{--  スライドショー用  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

{{--  カテゴリー移動  --}}
<script src="{{ asset('js/smooth_link.js') }}" defer></script>
            
@endsection