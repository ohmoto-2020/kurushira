@extends('common')
@section('title','マイページ | クルシラ')
<body class="body">
@section('content')
<div class="container">
  <div class="user">
    <div class="user__link">
      <a class="user__link__send" href="{{ route('edit') }}"><i class="fas fa-user-edit"></i>ユーザー情報の変更</a>
      <a class="user__link__send" href="{{ route('my_image') }}"><i class="far fa-image fa-lg	"></i>提供画像一覧</a>
    </div>
  </div>
  @if(!empty($match_cars))
    <div class="history-title">
      <p>前回の履歴</p>
      <p>{{ $selected_value['updated_at']->format('Y-m-d') }}</p>
    </div>
    @include('selected_value')
    @if(is_null($match_cars[0]))
      <p>前回の履歴</p>
      <p class="not-find">該当する車は見つかりませんでした</p>
    @else
      @include('match')
    @endif
  @else
    <p class="not-find">履歴はありません</p>
  @endif
</div>
<script src="{{ asset('/js/swiper.js') }}"></script>
@endsection
