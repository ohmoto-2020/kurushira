@extends('common')
@section('title','マイページ | クルシラ')
<body class="body">
@section('content')
<p style="color:red;">提供画像一覧</p>
<div class="offer-container">
  @foreach($my_images as $my_image)
  <div class="offer-container__card">
    <div class="offer-container__card__header">{{$my_image->car['name']}}</div>
    <div class="offer-container__card__body">
      <img  class="offer-container__card__body__image" src="{{$my_image['image']}}"  alt="{{ $my_image->car['name'] }}">
      <div class="offer-container__card__body__button">
        <button type="submit" class="send" value="削除">削除</button>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
