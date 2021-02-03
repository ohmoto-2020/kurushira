@extends('common')
@section('title','マイページ | クルシラ')
<body class="body">
@section('content')
<div class="container">
  <p style="color:red;">{{ Auth::user()->name }}さん</p>

  <a href="{{ route('edit') }}" style="color:red;">ユーザー登録内容の変更</a>
  <p style="color:red;">前回の履歴</p>
  <ul style="color: red;">
    <li>style:{{ $match_car['style'] }}</li>
    <li>size:{{ $match_car['size'] }}</li>
    <li>country:{{ $match_car['country'] }}</li>
    <li>uses:{{ $match_car['uses'] }}</li>
  </ul>
  @if($match_car["match_car"]->isEmpty())
    <p class="not-find" style="color: red;">該当する車は見つかりませんでした</p>
  @else
    @foreach($match_car["match_car"] as $car)
    <div class="result__box" style="color: red;">
      <p>車種名:{{ $car['name'] }}</p>
      <p>メーカー:{{ $car['maker'] }}</p>
      <p>価格:{{ $car['price'] }}万円</p>
    </div>
    @endforeach
  @endif
</div>
@endsection
