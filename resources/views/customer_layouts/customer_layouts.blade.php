<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="content-language" content="ja">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ mix('js/jquery-3.5.1.min.js') }}"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ mix('/css/customer.css') }}">
    <link href="{{ mix('css/style.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
 <body>

        @include('commons.shop_header')

        <div class="container">


            @yield('content')

        </div>

        @include('commons.shop_footer')

    </body>
</html>
