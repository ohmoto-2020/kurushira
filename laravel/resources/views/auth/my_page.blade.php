@extends('common')
@section('title','マイページ | クルシラ')
<body class="body">
@section('content')
<div class="container">
  <p style="color:red;">{{ Auth::user()->name }}さん</p>

  <a href="{{ route('edit') }}" style="color:red;">ユーザー登録内容の変更</a>
  <p style="color:red;">前回の履歴</p>
</div>
@endsection
