<header class="mb-2">
     <nav class="navbar navbar-expand-lg navbar-light border-secondary border-bottom">
        <div class="container">
            <a href="/" class="nav-link">
            
            {{--  DBからロゴのパスを取得  --}}
            @php
            $logo = App\Store::value('logo');
            @endphp
            {{--  <img src="/storage/storeLogo/{{$logo}}" width="130" alt="logo"></a>  --}}

            {{--  S3用  --}}
            <img src="{{$logo}}" width="130" alt="logo"></a>

            {{--  カートアイコンはpublic/image内に保存。本来の画像保存場所ではないが変更のない画像のため  --}}
            <div class="justify-content-left" id="nav-bar">
                <a href="/cart" class="nav-link"><img src="/image/cart_icon.png" width="30" alt="cart"></a>
            </div>
        </div>
    </nav>
</header>

