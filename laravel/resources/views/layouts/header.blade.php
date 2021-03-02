<h1 class="header__left"><a href="{{ url('/') }}">クルシラ</a></h1>
<button class="header__hamburger" onclick="toggle()">
  <span></span>
</button>
@if (Route::has('login'))
  <div class="header__right hide" id="hum">
  @auth
    <a href="{{ url('/my_page') }}" class="header__right__list">{{ Auth::user()->name }}さんの<br class="br">マイページ</a>
    <form class="logout" action="{{ route('logout') }}" method="POST">
      @csrf
      <input class="logout__button header__right__list" type="submit" value='ログアウト'>
    </form>
  @else
    <a href="{{ route('login') }}" class="header__right__list">ログイン</a>
    @if (Route::has('register'))
      <a href="{{ route('register') }}" class="header__right__list">ユーザー登録</a>
    @endif
  @endauth
@endif
    <a href="{{ route('about') }}" class="header__right__list">利用規約</a>
    <p onclick="toggle()" class="close">Close</p>
  </div>
