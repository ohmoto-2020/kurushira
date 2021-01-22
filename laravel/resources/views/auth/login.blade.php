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
					@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>

				<div class="container__card__body__box row">
					<label for="password">パスワード</label>
					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
					@error('password')
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

				<button type="submit" class="send">ログイン</button>
				@if (Route::has('password.request'))
				<a class="forget-pass" href="{{ route('password.request') }}">
					{{ __('パスワードを忘れた場合') }}
				</a>
				@endif
			</form>
		</div>
	</div>
</div>
@endsection
