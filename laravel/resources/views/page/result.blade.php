@extends('common')
@section('title','結果一覧 | クルシラ')

<body class="body">
  @section('content')
  <div class="result" style="color:red;">
    <ul>
      <li>スタイル:{{ $selected_value['style'] }}</li>
      <li>サイズ:{{ $selected_value['size'] }}</li>
      <li>国:{{ $selected_value['country'] }}</li>
      <li>用途:{{ $selected_value['uses'] }}</li>
    </ul>
    @if(empty($match_cars->toArray()['data']))
    <p class="not-find" style="color: red;">該当する車は見つかりませんでした</p>
    @else
    @foreach($match_cars as $car)
    <div class="result__box">
      <p>車種名:{{ $car['name'] }}</p>
      <p>メーカー:{{ $car['maker'] }}</p>
      <p>価格:{{ $car['price'] }}万円</p>
      @foreach($car->car_images as $image)
        <img src="{{$image['image']}}">
      @endforeach
    </div>
    @endforeach
    {{ $match_cars->links() }}
    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false" data-size="large" data-text="自分に合った車">Tweet</a>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    @endif

  </div>
  @endsection
