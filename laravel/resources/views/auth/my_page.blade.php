@extends('common')
@section('title','マイページ | クルシラ')
<body class="body">
@section('content')
<div class="container">
  <p style="color:red;">{{ Auth::user()->name }}さん</p>

  <a href="{{ route('edit') }}" style="color:blue;">ユーザー登録内容の変更</a>
  <p style="color:red;">前回の履歴</p>
  @if(!empty($match_cars->toArray()))
    <p style="color:red;">{{ $history_value['updated_at']->format('Y-m-d') }}</p>
    <ul style="color: red;">
      <li>style:{{ $history_value['style'] }}</li>
      <li>size:{{ $history_value['size'] }}</li>
      <li>country:{{ $history_value['country'] }}</li>
      <li>uses:{{ $history_value['uses'] }}</li>
    </ul>

    @if(empty($match_cars))
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
