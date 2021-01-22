<h1 class="header__left"><a href="{{ url('/') }}">クルシラ</a></h1>
@if (Route::has('login'))
<div class="header__right">
@auth
  <a href="{{ url('/myPage') }}" class="header__right__list">{{ Auth::user()->name }}さんのマイページ</a>
  <form class="logout" action="{{ route('logout') }}" method="POST">
    @csrf
    <input class="logout__button" type="submit" value='ログアウト'>
  </form>
@else
  <a href="{{ route('login') }}" class="header__right__list">ログイン</a>

  @if (Route::has('register'))
  <a href="{{ route('register') }}" class="header__right__list">ユーザー登録</a>
  @endif
@endauth
@endif
  <a href="{{ route('about') }}" class="header__right__list">サイト詳細</a>
</div>
