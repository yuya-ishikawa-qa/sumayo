<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('/css/store.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card mt-5">
                  <div class="card-header">
                    メッセージ
                  </div>
                  <div class="card-body">
                    <div class="card-message">
                      {{ $message }}
                    </div>
                  <div class="text-center mt-3">
                      <a href="/store"><button class="btn btn-primary">店舗管理画面へ</button></a>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</body>
</html>
