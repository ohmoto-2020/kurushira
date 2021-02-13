@extends('common')
@section('title','画像投稿 | クルシラ')
<body class="body">
@section('content')
<div class="offer-container">
  <div class="offer-container__card">
    <div class="offer-container__card__header">ご提供ありがとうございます</div>
    <div class="offer-container__card__body">
      <div class="offer-container__card__body__name">
        <p>メーカー：{{ $car_name[0]['maker'] }}</p>
        <p>&emsp;車&ensp;種&thinsp;：{{ $car_name[0]['name'] }}</p>
      </div>
      <img  class="offer-container__card__body__image" src="https://kurushira.s3-ap-northeast-1.amazonaws.com/{{ $cars[0]['image'] }}"  alt="{{ $car_name[0]['name'] }}">
    </div>
  </div>
</div>

@endsection
