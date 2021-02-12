<div class="match-container" style="color:red;">
  <div class="match-container__car">
    @foreach($match_cars as $car)
    <div class="match-container__car__box">
      <p class="match-container__car__box__name">車種名:{{ $car['name'] }}</p>
      <div class="match-container__car__box__title">
        <p>メーカー:{{ $car['maker'] }}</p>
        <p>価格:{{ $car['price'] }}万円</p>
      </div>
      @if(empty($car->car_images->toArray()))
        <div class="no-image">
          <i class="far fa-image fa-4x"><p>No&nbsp;Image</p></i>
        </div>
      @else
      <div class="swiper-custom-parent">
        <div class="swiper-container">
          <div class="swiper-wrapper">
            @foreach($car->car_images as $image)
            <img src="{{$image['image']}}" class="swiper-slide">
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
  {{ $match_cars->links('vendor.pagination.default') }}
</div>