@extends('common')
@section('title','画像投稿 | クルシラ')
<body class="body">
@section('content')
<div class="section">
  <p style="color: blue;">{{ session('message') }}</p>
  <form action="{{ action('CarController@post_car') }}" class="section__card" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="section__card__header">画像を提供する</div>
    <p class="section__card__title">車種を選択してください</p>
    <div class="section__card__maker">
      @foreach($car_array as $maker=>$cars)
      <div class="section__card__maker__box">
        <div class="section__card__maker__box__form">
          <label>
            <input type="radio" name="maker" value="{{ $maker }}">
            {{ $maker }}
          </label>
        </div>
        <select name="{{ $maker }}">
          <option value="">---------</option>
          @foreach($cars as $car)
          <option value="{{ $car['name'] }}">
            {{ $car['name'] }}
          </option>
          @endforeach
        </select>
      </div>
      @endforeach
    </div>
    <div class="section__card__file">
      <label for="file">画像を選択してください</label>
      <input type="file" name="file">
    </div>
    <div class="section__card__button">
      <input type="submit" value="アップロード" class="send">
    </div>
  </form>
</div>

@endsection
