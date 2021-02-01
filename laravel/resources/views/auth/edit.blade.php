@extends('common')
@section('title','ユーザー情報編集 | クルシラ')
<body class="body">
@section('content')
<div class="container">
  <p style="color: blue;">{{ session('message') }}</p>
  <form method="POST" action="{{ action('UserController@update') }}">
    @csrf
    <div class="form-group">
      <label for="name">名前</label>
      @if(Auth::id() == 1)
      <p style="color:red;">ゲストユーザーは、変更ができません</p>
      <input type="text" name="name" class="form-control" value="{{ $user->name }}" disabled>
      @else
      <input type="text" name="name" class="form-control" value="{{ $user->name }}">
      @endif
    </div>
    <div class="form-group">
      <label for="email">email</label>
      @if(Auth::id() == 1)
      <input type="text" name="email" class="form-control" value="{{ $user->email }}" disabled>
      @else
      <input type="text" name="email" class="form-control" value="{{ $user->email }}">
      @endif
      @if(Auth::id() == 1)
      <button type="submit" class="user-btn" disabled>変更</button>
      @else
      <button type="submit" class="user-btn">変更</button>
      @endif
    <div>
  </form>
</div>
@endsection
