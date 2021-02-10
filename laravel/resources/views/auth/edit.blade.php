@extends('common')
@section('title','ユーザー情報編集 | クルシラ')
<body class="body">
@section('content')
<div class="container">
  <p style="color: blue;">{{ session('message') }}</p>
  <div class="container__card">
    <div class="container__card__header">ユーザ情報編集</div>
    <div class="container__card__body">
      <form method="POST" action="{{ action('UserController@update') }}">
        @csrf
        <div class="form-group">
          @if(Auth::id() == 1)
          <p style="color:red;">ゲストユーザーは、変更ができません</p>
          <div class="container__card__body__box">
            <label for="name">名前</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" disabled>
          </div>
          @else
          <div class="container__card__body__box">
            <label for="name">名前</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
          </div>
          @endif
        </div>
        <div class="form-group">
          <div class="container__card__body__box">
            <label for="email">メールアドレス</label>
            @if(Auth::id() == 1)
            <input type="text" name="email" class="form-control" value="{{ $user->email }}" disabled>
            @else
            <input type="text" name="email" class="form-control" value="{{ $user->email }}">
            @endif
          </div>
          <div class="container__card__body__button">
            @if(Auth::id() == 1)
            <button type="submit" class="send" disabled>変更</button>
            @else
            <button type="submit" class="send">変更</button>
            @endif
          </div>
        <div>
      </form>
    </div>
  </div>
</div>
@endsection
