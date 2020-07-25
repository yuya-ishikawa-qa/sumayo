<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('/css/customer.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">        

</head>
 <body>

        @include('commons.shop_header')

        <div class="container">


            @yield('content')

        </div>

        @include('commons.shop_footer')

    </body>
</html>
