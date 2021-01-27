@extends('common')
@section('title','ログイン | クルシラ')
<body class="body">
@section('content')
<div class="container">
	<div class="container__card">
		<div class="container__card__header">ログイン</div>
		<div class="container__card__body">
			<form method="POST" action="{{ route('login') }}">
				@csrf
				<div class="container__card__body__box row">
					<label for="email">メールアドレス</label>
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
				</div>

				<div class="container__card__body__box row">
					<label for="password">パスワード</label>
					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
					@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
						<label class="form-check-label" for="remember">
							{{ __('この情報を保存しますか？') }}
						</label>
					</div>
				</div>
				<div class="container__card__body__button">
					<button type="submit" class="send">ログイン</button>
					<button class="send">
						<a href="{{ route('login.guest_login') }}">ゲストログイン</a>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
