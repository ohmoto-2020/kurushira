<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS -->
    @if(app('env')=='local')
      <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    @elseif(app('env')=='production')
      <link href="{{ secure_asset('/css/app.css') }}" rel="stylesheet">
    @endif

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/2353a33daa.js" crossorigin="anonymous"></script>
    <!-- ファビコン -->
    <link rel="icon" href="{{ asset('/favicon.ico') }}">
    <!-- swiper.js -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- タイトル -->
    <title>@yield('title')</title>
  </head>
  <body class="@yield('body')">
    <header class="header">
      @include('layouts.header')
    </header>
    <main style="margin-top:6rem;">
      @yield('content')
    </main>
  </body>
</html>
