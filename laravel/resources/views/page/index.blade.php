@extends('common')
@section('title','ホーム | クルシラ')
<body class="home-body">
@section('content')
<div class="main">
  <div class="card">
      <div class="card__title"><i class="fas fa-search"></i>好きな車を見つけよう</div>
      <ul class="card__list">
        <li>特徴を選ぶとあなたにあった車</li>
        <li>登録車数350台！</li>
        <li></li>
      </ul>
    <div class="button__group">
      <a href="{{ route('main') }}" class="button__group__start">サーチ</a>
    </div>
  </div>

  <div class="card">
      <div class="card__title"><i class="fas fa-camera"></i>画像を投稿しよう</div>
      <ul class="card__list">
        <li>特徴を選ぶとあなたにあった車</li>
        <li>登録車数350台！</li>
        <li></li>
      </ul>
    <div class="button__group">
      <a href="{{ route('main') }}" class="button__group__start">シェア</a>
    </div>
  </div>
</div>


@endsection
