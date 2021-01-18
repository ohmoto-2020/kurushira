<h1 class="header__left">クルシラ〜みんなで育てる車アプリ〜</h1>
@if (Route::has('login'))
<div class="header__right">
@auth
  <a href="{{ url('/home') }}">マイページ</a>
@else
  <a href="{{ route('login') }}">ログイン</a>

  @if (Route::has('register'))
    <a href="{{ route('register') }}">ユーザー登録</a>
  @endif
@endauth
</div>
@endif
