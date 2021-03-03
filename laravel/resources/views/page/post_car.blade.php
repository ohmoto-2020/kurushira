@extends('common')
@section('title','画像投稿 | クルシラ')
@section('body','body')
@section('content')
<div class="section">
  <p style="color: red;">{{ session('message') }}</p>
  <p class="section__title">2ステップで画像を提供する<br><span>※約1分で操作が完了します</span></p>
  <form action="{{ action('CarController@post_car') }}" class="section__form" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="section__form__card">
      <div class="section__form__card__header"><i class="fas fa-car"></i>STEP1<br class="br"><span>車種を選択してください</span></div>
      <div class="section__form__card__maker">
        @foreach($car_array as $maker=>$cars)
        <div class="section__form__card__maker__box">
          <div class="section__form__card__maker__box__form">
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
    </div>
    <div class="section__form__arrow">&#9662;</div>
    <div class="section__form__card">
      <p class="section__form__card__header"><i class="fas fa-camera"></i>STEP2<br class="br"><span>画像を選択してください</span></p>
      <div class="section__form__card__file">
        <input type="file" name="file" accept="image/*">
      </div>
    </div>
    <div class="section__form__card__button">
      <button type="submit" class="send" value="アップロード">アップロード</button>
    </div>
  </form>
</div>

@endsection
