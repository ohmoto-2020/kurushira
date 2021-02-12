@extends('common')
@section('title','提供画像一覧 | クルシラ')
<body class="body">
@section('content')
<p style="color: blue;">{{ session('message') }}</p>
<p style="color:red;">提供画像一覧</p>
@if((empty($my_images)))
  <div class="offer-container">
    @foreach($my_images as $my_image)
    <div class="offer-container__card">
      <div class="offer-container__card__header">{{$my_image->car->name}}</div>
      <div class="offer-container__card__body">
        <img  class="offer-container__card__body__image" src="{{$my_image['image']}}"  alt="{{ $my_image->car->name }}">
        <form action="{{ action('CarController@delete') }}" method="POST">
        @csrf
          <div class="offer-container__card__body__button">
            <input type="hidden" name="image" value="{{ $my_images[0]->image }}">
            <input type="submit" value="削除">
          </div>
        </form>
      </div>
    </div>
    @endforeach
  </div>
@else
  <p style="color: blue;">画像は提供されていません</p>
@endif
@endsection
