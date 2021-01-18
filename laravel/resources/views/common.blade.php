<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- CSS -->
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
  <title>@yield('title')</title>
</head>

<body>
  <header class="header">
    @include('layouts.header')
  </header>
  <main>
    <div>
    @yield('content')
    </div>
  </main>
</body>
</html>
