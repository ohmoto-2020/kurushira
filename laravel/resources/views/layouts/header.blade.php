
  @if (Route::has('login'))
  <div class="top-right links">
  @auth
    <a href="{{ url('/home') }}">マイページ</a>
  @else
    <a href="{{ route('login') }}">ログイン</a>

    @if (Route::has('register'))
      <a href="{{ route('register') }}">新規登録</a>
    @endif
  @endauth
  </div>
  @endif
