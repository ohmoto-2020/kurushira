@extends('common')
@section('title','結果一覧 | クルシラ')
<body class="body">
@section('content')
<div class="result" style="color:red;">
  @if($match_car->isEmpty())
    <p class="not-find" style="color: red;">該当する車は見つかりませんでした</p>
  @else
    @foreach($match_car as $car)
    <div class="result__box">
      <p>車種名:{{ $car['name'] }}</p>
      <p>メーカー:{{ $car['maker'] }}</p>
      <p>価格:{{ $car['price'] }}万円</p>
    </div>
    @endforeach
  @endif
</div>
@endsection
