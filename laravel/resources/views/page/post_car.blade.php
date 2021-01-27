@extends('common')
@section('title','画像投稿 | クルシラ')
<body class="body">
@section('content')
<div class="section">
  <form action="{{ route('post_car') }}" class="section__card" method="POST">
    <div class="section__card__header">画像を提供する</div>
    <p class="section__card__title">車種を選択してください</p>
    <div class="section__card__maker">
      @foreach($car_array as $maker=>$cars)
      <div class="section__card__maker__box">
        <div class="section__card__maker__box__form">
          <input type="radio" name="maker" value="{{ $maker }}" id="{{ $maker}}">
          <label for="{{ $maker }}">{{ $maker }}</label>
        </div>
        <select name="{{ $maker }}" id="{{ $maker }}">
          <option value="">---------</option>
          @foreach($cars as $car)
          <option value="車">
            {{ $car['name'] }}
          </option>
          @endforeach
        </select>
      </div>
      @endforeach
    </div>
    <div class="section__card__file">
      <label for="file">画像を選択してください</label>
      <input type="file" name="file" id="file">
    </div>
    <div class="section__card__button">
      <button type="submit" class="send" value="次へ">提供する</button>
    </div>
  </form>
</div>

@endsection
