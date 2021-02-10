@extends('common')
@section('title','マイページ | クルシラ')
<body class="body">
@section('content')
<div class="container">
  <p style="color:red;">{{ Auth::user()->name }}さん</p>

  <a href="{{ route('edit') }}" style="color:blue;">ユーザー登録内容の変更</a>
  @if(!empty($match_cars->toArray()))
    <div class="history-title">
      <p style="color:red;">前回の履歴</p>
      <p style="color:red;">{{ $history_value['updated_at']->format('Y-m-d') }}</p>
    </div>
    <div class="selected-value">
      <div class="selected-value__card">
        <p class="selected-value__card__header">選択したやつ</p>
        <ul class="selected-value__card__body">
          <li>スタイル:{{ $history_value['style'] }}</li>
          <li>サイズ:{{ $history_value['size'] }}</li>
          <li>国:{{ $history_value['country'] }}</li>
          <li>用途:{{ $history_value['uses'] }}</li>
        </ul>
      </div>
    </div>
    @if(empty($match_cars))
      <p style="color:red;">前回の履歴</p>
      <p class="not-find" style="color: red;">該当する車は見つかりませんでした</p>
    @else
      @include('match')
    @endif
  @else
    <p style="color:red;">履歴はありません</p>
  @endif
</div>
<script src="{{ asset('/js/swiper.js') }}"></script>
@endsection
