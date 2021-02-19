@extends('common')
@section('title','画像投稿 | クルシラ')
<body class="body">
@section('content')
<div class="section">
  <p style="color: blue;">{{ session('message') }}</p>
  @if(Auth::id() == 1)
    <p style="color:red;">ゲストユーザーは画像提供ができません</p>
  @endif
  <p class="section__title">2ステップで画像を提供する<br><span>※約1分で操作が完了します</span></p>
  <form action="{{ action('CarController@post_car') }}" class="section__form" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="section__form__card">
      <div class="section__form__card__header"><i class="fas fa-car"></i>STEP1<span>車種を選択してください</span></div>
      <div class="section__form__card__maker">
        @foreach($car_array as $maker=>$cars)
        <div class="section__form__card__maker__box">
          <div class="section__form__card__maker__box__form">
            <label>
            @if(Auth::id() == 1)
              <input type="radio" name="maker" value="{{ $maker }}" disabled>
              {{ $maker }}
            @else
              <input type="radio" name="maker" value="{{ $maker }}">
              {{ $maker }}
            @endif
            </label>
          </div>
          <select name="{{ $maker }}">
            <option value="">---------</option>
            @foreach($cars as $car)
            @if(Auth::id() == 1)
              <option value="{{ $car['name'] }}" disabled>
                {{ $car['name'] }}
              </option>
            @else
              <option value="{{ $car['name'] }}">
                {{ $car['name'] }}
              </option>
            @endif
            @endforeach
          </select>
        </div>
        @endforeach
      </div>
    </div>
    <div class="section__form__arrow">&#9662;</div>
    <div class="section__form__card">
      <p class="section__form__card__header"><i class="fas fa-camera"></i>STEP2<span>画像を選択してください</span></p>
      <div class="section__form__card__file">
        @if(Auth::id() == 1)
          <input type="file" name="file" disabled>
        @else
          <input type="file" name="file" accept="image/*">
        @endif
      </div>
    </div>
    <div class="section__form__card__button">
      @if(Auth::id() == 1)
        <input type="submit" value="アップロード" class="send" disabled>
      @else
        <input type="submit" value="アップロード" class="send">
      @endif
    </div>
  </form>
</div>

@endsection
