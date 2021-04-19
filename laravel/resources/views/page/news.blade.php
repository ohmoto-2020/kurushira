@extends('common')
@section('title','最新カーニュース | クルシラ')
@section('body','body')
@section('content')
<div class="news-container">
  <h2>国内最新カーニュース</h2>
  <table class="news-container__table">
  @foreach($news as $data)
    <tr class="news-container__table__tr">
      <td>
        <img class="news-container__table__tr__image" src="{{$data['thumbnail']}}">
      </td>
      <td>
        <a class="news-container__table__tr__title" href="{{$data['url']}}">{{$data['name']}}</a>
      </td>
    </tr>
    @endforeach
  </table>
</div>

@endsection
