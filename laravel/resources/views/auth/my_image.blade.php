@extends('common')
@section('title','提供画像一覧 | クルシラ')
@section('body','body')
@section('content')
<div class="my-image">
  <p style="color: blue;">{{ session('message') }}</p>
  <p class="title">提供画像一覧</p>
  @if((!empty($my_images->toArray())))
    <div class="my-image__container">
      @foreach($my_images as $my_image)
      <div class="my-image__container__card">
        <div class="my-image__container__card__header">{{$my_image->car->name}}</div>
        <div class="my-image__container__card__body">
          <img  class="my-image__container__card__body__image" src="https://kurushira.s3-ap-northeast-1.amazonaws.com/{{$my_image['image']}}"  alt="{{ $my_image->car->name }}">
          <form action="{{ action('CarController@delete_post_image') }}" method="POST">
            @csrf
            <input type="hidden" name="image" value="{{ $my_image->image }}">
            <button type="submit" class="send" value="削除">削除</button>
          </form>
        </div>
      </div>
      @endforeach
    </div>
  @else
    <p class="not-find">提供している画像はありません</p>
  @endif
</div>
@endsection
