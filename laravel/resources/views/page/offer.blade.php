@extends('common')
@section('title','画像投稿 | クルシラ')
<body class="body">
@section('content')
<div class="section">
  <div class="section__card">
    <div class="section__card__header">ご提供ありがとうございます</div>
    <div class="section__card__body">
      <div>{{ $car_name[0]['name'] }}</div>
      <img src="{{ $cars[0]['image'] }}"  alt="{{ $car_name[0]['name'] }}">
    </div>
  </div>
</div>

@endsection
