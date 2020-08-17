<header class="mb-2">

    {{--  <nav class="navbar navbar navbar-light border-secondary border-bottom">  --}}
    {{--  お客さん画面の全ページできたら↓のDBから呼び出すようにする
        <div class="navbar-brand m-0"><img class="navbar-brand m-0 img-fluid" src=
        "/storage/public/storeLogo/{{$store->logo}"></div>  --}}

        {{--  <div class="navbar-brand m-0"><img class="navbar-brand m-0 img-fluid" src=
        "/storage/public/storeLogo/9SVLBciOWy6F7nh7fvvOoPwIPrzO8MbX2hw6dDwf.png"></div>
        
    </nav>  --}}

     <nav class="navbar navbar-expand-lg navbar-light border-secondary border-bottom">
        <div class="container">

            <a href="/" class="nav-link">ロゴ</a>
            {{--  ロゴ画像表示はルート直す必要あり。あとで
            <a href="/" class="nav-link"><img src="/storage/storeLogo/{{$store->logo}}" width="120" alt="logo"></a>  --}}

            {{--  カートアイコンはpublic/image内に保存。本来の画像保存場所ではないが変更のない画像のため  --}}
            <div class="justify-content-left" id="nav-bar">
                <a href="/cart" class="nav-link"> カート<img src="/image/cart_icon.png" width="25" alt="cart"></a>
            </div>
        </div>
        
    </nav>

</header>

