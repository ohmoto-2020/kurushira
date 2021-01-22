@extends('common')
@section('title','ホーム | クルシラ')
<body class="home-body">
@section('content')
<div class="main">
  <div class="card">
      <div class="card__title"><i class="fas fa-search"></i>好きな車を見つける</div>
      <ul class="card__list">
        <li>特徴を選んで探せる</li>
        <li>登録車数350台！</li>
        <li>いろんなパターンを試そう</li>
      </ul>
    <div class="button__group">
      <a href="{{ route('main') }}" class="button__group__start">サーチ</a>
    </div>
  </div>

  <div class="card">
      <div class="card__title"><i class="fas fa-camera"></i>画像を投稿する</div>
      <ul class="card__list">
        <li>あなたの画像でアプリを充実</li>
        <li>撮った画像を共有</li>
        <li>ナンバープレートは消してから</li>
      </ul>
    <div class="button__group">
      <a href="{{ route('main') }}" class="button__group__start">シェア</a>
    </div>
  </div>
</div>


@endsection
