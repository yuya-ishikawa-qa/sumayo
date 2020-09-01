@extends('customer_layouts.customer_layouts')
    
@section('content')

    <div class="container">

{{--  カートに入れたら表示されるメッセージあとで追加予定  --}}
    {{--  @if (session('flash_message'))
        <div class="mb-5">
            <div class="alert alert-success" role="alert">
                {{ session('flash_message') }}
            </div>
        </div>
    @endif  --}}


{{--  トップ画面スライドショー  --}}
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    @foreach ($store as $store)

                    {{--  <div class="carousel-item active">
                        <img class="d-block w-100" src="/storage/storeImages/{{ $store->top_image1 }}" alt="First slide" id="top_image">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/storage/storeImages/{{ $store->top_image2 }}"   alt="Second slide" id="top_image">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/storage/storeImages/{{ $store->top_image3 }}"   alt="Third slide" id="top_image">
                    </div>  --}}

                    {{--  S3用  --}}
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ $store->top_image1 }}" alt="First slide" id="top_image">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ $store->top_image2 }}"   alt="Second slide" id="top_image">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ $store->top_image3 }}"   alt="Third slide" id="top_image">
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
                    <h1 class="col-sm-12">{{ $store->name }}</h1>
                    <p class="col-8 mb-0">営業時間  {{ substr($store->start_time, 0, 5) }}-{{ substr($store->end_time, 0, 5) }}</p>
                    @endforeach
                    <a href="{{ url('/shopinfo')}}" class="col-4">店舗詳細</a>
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

            @foreach ($items as $item)
            @if($item->item_category_id == 1)<h3 class="col-12 mt-2" id="1">おすすめ</h3>
            @break
            @endif
            @endforeach

            @foreach ($items as $item)
            @if($item->item_category_id == 1)
            <div class="col-6 col-sm-4 col-lg-3">
                <a class="stretched-link">
                <div class="card-body p-2">
                    <a class="embed-responsive embed-responsive-4by3" href='/detail/{{$item->id}}' id="items_list_image">

                    {{--  <img src=
                        @if ( $item->path == null) "/storage/items/no_image.png" @else "/storage/items/{{$item->path}}" @endif
                    class="card-img-top embed-responsive-item" alt="items_list_image" id="items_list_image">  --}}

                    {{--  S3用  --}}
                    <img src=
                        @if ( $item->path == null) "/image/no_image.png" @else "{{$item->path}}" @endif
                    class="card-img-top embed-responsive-item" alt="items_list_image" id="items_list_image">
                    </a>
                    <p class="product-title mb-0" href='/detail/{{$item->id}}'>{{ $item->item_name }}
                    </p>
                    <p class="sale-price mb-0" href='/detail/{{$item->id}}'>&yen;{{ $item->price }}
                    </p>
                </div>
                </a>
            </div>
            @endif
            @endforeach

            @foreach ($items as $item)
            @if($item->item_category_id == 2)<h3 class="col-12 mt-2" id="2">単品</h3>
            @break
            @endif
            @endforeach

            @foreach ($items as $item)
            @if($item->item_category_id == 2)
            <div class="col-6 col-sm-4 col-lg-3">
                <a class="stretched-link">
                <div class="card-body p-2">
                    <a class="embed-responsive embed-responsive-4by3" href='/detail/{{$item->id}}'>
                    <img src=
                        @if ( $item->path == null) "/image/no_image.png" @else "{{$item->path}}" @endif
                    class="card-img-top embed-responsive-item" alt="items_list_image" id="items_list_image">
                    </a>
                    <p class="product-title mb-0" href='/detail/{{$item->id}}'>{{ $item->item_name }}
                    </p>
                    <p class="sale-price mb-0" href='/detail/{{$item->id}}'>&yen;{{ $item->price }}
                    </p>
                </div>
                </a>
            </div>
            @endif
            @endforeach

            @foreach ($items as $item)
            @if($item->item_category_id == 3)<h3 class="col-12 mt-2" id="3">その他</h3>
            @break
            @endif
            @endforeach

            @foreach ($items as $item)
            @if($item->item_category_id == 3)
            <div class="col-6 col-sm-4 col-lg-3">
                <a class="stretched-link">
                <div class="card-body p-2">
                    <a class="embed-responsive embed-responsive-4by3" href='/detail/{{$item->id}}'>
                    <img src=
                        @if ( $item->path == null) "/image/no_image.png" @else "{{$item->path}}" @endif
                    class="card-img-top embed-responsive-item" alt="items_list_image" id="items_list_image">
                    </a>
                    <p class="product-title mb-0" href='/detail/{{$item->id}}'>{{ $item->item_name }}
                    </p>
                    <p class="sale-price mb-0" href='/detail/{{$item->id}}'>&yen;{{ $item->price }}
                    </p>
                </div>
                </a>
            </div>
            @endif
            @endforeach

            @foreach ($items as $item)
            @if($item->item_category_id == 4)<h3 class="col-12 mt-2" id="4">ドリンク</h3>
            @break
            @endif
            @endforeach

            @foreach ($items as $item)
            @if($item->item_category_id == 4)
            <div class="col-6 col-sm-4 col-lg-3">
                <a class="stretched-link">
                <div class="card-body p-2">
                    <a class="embed-responsive embed-responsive-4by3" href='/detail/{{$item->id}}'>
                    <img src=
                        @if ( $item->path == null) "/image/no_image.png" @else "{{$item->path}}" @endif
                    class="card-img-top embed-responsive-item" alt="items_list_image" id="items_list_image">
                    </a>
                    <p class="product-title mb-0" href='/detail/{{$item->id}}'>{{ $item->item_name }}
                    </p>
                    <p class="sale-price mb-0" href='/detail/{{$item->id}}'>&yen;{{ $item->price }}
                    </p>
                </div>
                </a>
            </div>
            @endif
            @endforeach

            @foreach ($items as $item)
            @if($item->item_category_id == 0)<h3 class="col-12 mt-2" id="0"></h3>
            @break
            @endif
            @endforeach

            @foreach ($items as $item)
            @if($item->item_category_id == 0)
            <div class="col-6 col-sm-4 col-lg-3">
                <a class="stretched-link">
                <div class="card-body p-2">
                    <a class="embed-responsive embed-responsive-4by3" href='/detail/{{$item->id}}'>
                    <img src=
                        @if ( $item->path == null) "/image/no_image.png" @else "{{$item->path}}" @endif
                    class="card-img-top embed-responsive-item" alt="items_list_image" id="items_list_image">
                    </a>
                    <p class="product-title mb-0" href='/detail/{{$item->id}}'>{{ $item->item_name }}
                    </p>
                    <p class="sale-price mb-0" href='/detail/{{$item->id}}'>&yen;{{ $item->price }}
                    </p>
                </div>
                </a>
            </div>
            @endif
            @endforeach
            @endisset
            </div>
    </div>

{{--  スライドショー用  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

@endsection