<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/2353a33daa.js" crossorigin="anonymous"></script>
    <!-- ファビコン -->
    <link rel="icon" href="{{ asset('/favicon.ico') }}">
    <!-- タイトル -->
    <title>@yield('title')</title>
  </head>

    <header class="header">
      @include('layouts.header')
    </header>

    <main>
      @yield('content')
    </main>

  </body>
</html>