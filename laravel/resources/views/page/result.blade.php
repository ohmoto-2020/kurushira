@extends('common')
@section('title','結果一覧 | クルシラ')
<body class="body">
@section('content')
<div class="result" style="color:red;">
<pre>

  {{ var_dump($match_car)}}
</pre>
</div>
@endsection
