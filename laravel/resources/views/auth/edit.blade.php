@extends('common')
@section('title','ユーザー情報編集 | クルシラ')
<body class="body">
@section('content')
<div class="container">
  <form method="POST" action="{{ action('UserController@update') }}">
    @csrf
    <div class="form-group">
      <label for="name">名前</label>
      <input type="text" name="name" class="form-control" value="{{ $user->name }}">
    </div>
    <div class="form-group">
      <label for="email">email</label>
      <input type="text" name="email" class="form-control" value="{{ $user->email }}">
      <button type="submit" class="user-btn">変更</button>
    <div>
  </form>
</div>
@endsection
