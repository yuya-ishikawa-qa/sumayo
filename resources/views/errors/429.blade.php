<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>429 Error</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>

  <div class="container">
    <div class="font-weight-lighter mt-5" style="font-size:30px">
      <h3 class="text-center">
        429 Not Found
      </h3>
    </div>
    <div>
      <img width="100%" src="/image/httpError.png" alt="HTTPエラー">
    </div>
    <div class="text-center">
      <a href="/"><button class="btn btn-secondary">トップへ戻る</button></a>
    </div>
  </div>

</body>
</html>