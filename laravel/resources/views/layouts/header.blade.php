<h1 class="header__left"><a href="{{ url('/') }}">クルシラ</a></h1>
@if (Route::has('login'))
<div class="header__right">
@auth
  <a href="{{ url('/myPage') }}">マイページ</a>
  <a href="{{ route('logout') }}">ログアウト</a>
@else
  <a href="{{ route('login') }}">ログイン</a>

  @if (Route::has('register'))
  <a href="{{ route('register') }}">ユーザー登録</a>
  @endif
@endauth
@endif
  <a href="{{ route('about') }}">サイト詳細</a>
</div>
