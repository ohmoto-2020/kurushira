@extends('common')
@section('title','結果一覧 | クルシラ')
<body class="body">
@section('content')
<div class="result" style="color:red;">
  <ul>
    <li>style:{{ $match_car['style'] }}</li>
    <li>size:{{ $match_car['size'] }}</li>
    <li>country:{{ $match_car['country'] }}</li>
    <li>uses:{{ $match_car['uses'] }}</li>
  </ul>
<pre>
  <!-- {{var_dump($match_car["match_car"])}} -->
</pre>
  @if($match_car["match_car"]->isEmpty())
    <p class="not-find" style="color: red;">該当する車は見つかりませんでした</p>
  @else
    @foreach($match_car["match_car"] as $car)
    <div class="result__box">
      <p>車種名:{{ $car['name'] }}</p>
      <p>メーカー:{{ $car['maker'] }}</p>
      <p>価格:{{ $car['price'] }}万円</p>
    </div>
    @endforeach
    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false" data-size="large" data-text="自分に合った車" >Tweet</a>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
  @endif

</div>
@endsection
