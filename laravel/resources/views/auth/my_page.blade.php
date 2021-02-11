@extends('common')
@section('title','マイページ | クルシラ')
<body class="body">
@section('content')
<div class="container">
  <p style="color:red;">{{ Auth::user()->name }}さん</p>

  <a href="{{ route('edit') }}" style="color:blue;">ユーザー情報の変更</a>
  @if(!empty($match_cars->toArray()))
    <div class="history-title">
      <p style="color:red;">前回の履歴</p>
      <p style="color:red;">{{ $selected_value['updated_at']->format('Y-m-d') }}</p>
    </div>
    @include('selected_value')
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
