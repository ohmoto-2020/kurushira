@extends('common')
@section('title','ホーム | クルシラ')
@section('body','home-body')
@section('content')
<div class="main">
  <div class="card">
    <div class="card__title"><i class="fas fa-search"></i>好きな車を見つける</div>
    <ul class="card__list">
      <li><i class="fas fa-check-square"></i>特徴を選んで探せる</li>
      <li><i class="fas fa-check-square"></i>登録車数350台！</li>
      <li><i class="fas fa-check-square"></i>いろんなパターンを試そう</li>
    </ul>
    <div class="button__group">
      <a href="{{ route('main') }}" class="button__group__start">サーチ</a>
    </div>
  </div>

  <div class="card">
    <div class="card__title"><i class="fas fa-camera"></i>画像を提供する</div>
    <ul class="card__list">
      <li><i class="fas fa-check-square"></i>あなたの画像でアプリを充実</li>
      <li><i class="fas fa-check-square"></i>撮った画像を共有</li>
      <li><i class="fas fa-check-square"></i>ナンバープレートは消してから</li>
    </ul>
    <div class="button__group">
      <a href="{{ route('post_car') }}" class="button__group__start">シェア</a>
    </div>
  </div>
</div>
@endsection
