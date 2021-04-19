@extends('common')
@section('title','お気に入り | クルシラ')
@section('body','body')
@section('content')

<div class="match-container">
  @if(empty($favorites->count()))
  <p class="not-find">いいねした車はありません</p>
  @else
  <div class="match-container__car">
    @foreach($favorites as $favorite)
    <div class="match-container__car__box">
      <div class="match-container__car__box__value">
        <p class="match-container__car__box__value__name">車種名:{{ $favorite->car->name }}</p>
        <p>メーカー:{{ $favorite->car->maker }}</p>
        <p>価格:{{ $favorite->car->price }}万円</p>
        <div class="match-container__car__box__value__favorite">
          <car-like :initial-is-liked-by='@json($favorite->car->isLikedBy(Auth::user()))' :initial-count-likes='@json($favorite->car->count_likes)' :authorized='@json(Auth::check())' endpoint="{{ route('like', ['car' => $favorite->car]) }}">
          </car-like>
        </div>
      </div>
      @if(empty($favorite->car->car_images()->get()->count()))
      <div class="no-image">
        <i class="far fa-image fa-4x">
          <p>No&nbsp;Image</p>
        </i>
      </div>
      @else
      <div class="swiper-custom-parent">
        <div class="swiper-container">
          <div class="swiper-wrapper">
            @foreach($favorite->car->car_images()->get() as $image)
            <div class="swiper-slide">
              <img src="https://kurushira.s3-ap-northeast-1.amazonaws.com/{{$image['image']}}">
              <car-report :initial-is-reported-by='@json($image->isReportedBy(Auth::user()))' :initial-count-reports='@json($image->count_reports)' :authorized='@json(Auth::check())' endpoint="{{ route('report', ['car_image' => $image]) }}">
              </car-report>
            </div>
            @endforeach
          </div>
          <!-- ↓ページネーション -->
          <div class="swiper-pagination"></div>
          <!-- ↓ナビゲーションボタン -->
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
      </div>
      @endif
    </div>
    @endforeach
  </div>
  @endif
</div>

@endsection
