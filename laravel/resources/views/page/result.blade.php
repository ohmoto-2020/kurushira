@extends('common')
@section('title','結果一覧 | クルシラ')

<body class="body">
  @section('content')
  @include('selected_value')
  @if(empty($match_cars->toArray()['data']))
    <p class="not-find">該当する車は見つかりませんでした</p>
  @else
  <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false" data-size="large" data-text="自分に合った車">Tweet</a>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    @include('match')
  @endif

  <script src="{{ asset('/js/swiper.js') }}"></script>
  @endsection
