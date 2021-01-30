@extends('common')
@section('title','ユーザー登録 | クルシラ')
<body class="body">
@section('content')
<div class="container">
	<div class="container__card">
		<div class="container__card__header">ユーザー登録</div>

		<div class="container__card__body">
			<form method="POST" action="{{ route('register') }}">
				@csrf
				<div class="container__card__body__box row">
						<label for="name" class="text-md-right">{{ __('ユーザー名') }}
							<small class="text-danger">（必須）</small>
						</label>
						<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="※15文字以内">
						@error('name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
				</div>

				<div class="container__card__body__box row">
					<label for="email" class="text-md-right">{{ __('メールアドレス') }}
						<small class="text-danger">（必須）</small>
					</label>
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="例）example@co.jp">

					@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>

				<div class="container__card__body__box row">
					<label for="password" class="text-md-right">{{ __('パスワード') }}
						<small class="text-danger">（必須）</small>
					</label>
					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="※8文字以上">

					@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>

				<div class="container__card__body__box row">
					<label for="password-confirm" class="text-md-right">{{ __('パスワードの確認') }}
						<small class="text-danger">（必須）</small>
					</label>
					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="※再入力してください">

				</div>
				<div class="container__card__body__button">
					<button type="submit" class="send">
						{{ __('ユーザー登録') }}
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
