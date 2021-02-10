@extends('common')
@section('title','結果一覧 | クルシラ')

<body class="body">
  @section('content')
  <div class="selected-value">
    <div class="selected-value__card">
      <p class="selected-value__card__header">選択したやつ</p>
      <ul class="selected-value__card__body">
        <li>スタイル:{{ $selected_value['style'] }}</li>
        <li>サイズ:{{ $selected_value['size'] }}</li>
        <li>国:{{ $selected_value['country'] }}</li>
        <li>用途:{{ $selected_value['uses'] }}</li>
      </ul>
    </div>
  </div>
  @if(empty($match_cars->toArray()['data']))
    <p class="not-find">該当する車は見つかりませんでした</p>
  @else
  <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false" data-size="large" data-text="自分に合った車">Tweet</a>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    @include('match')
  @endif

  <script src="{{ asset('/js/swiper.js') }}"></script>
  @endsection
