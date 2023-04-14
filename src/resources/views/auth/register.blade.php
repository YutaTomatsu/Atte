@extends('layouts.app')
  <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@section('content')
<body>
<header>
    <h2 class="title">Atte</h2>
</header>

<main>
    <div class="form__content">
    <h2 class="registe__title">会員登録</h2>
    <form class="form" method="POST" action="{{ route('register') }}" onsubmit="return validateForm()">
    @csrf
    <div class="form__input">
        <input id="name" type="text" class="input__form @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="名前">
        <p id="name__error"></p>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

        <input id="email" type="email" class="input__form @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="メールアドレス">
        <p id="email__error"></p>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        <input id="password" type="password" class="input__form @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="パスワード">
        <p id="password__error"></p>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

        <input id="password-confirm" type="password" class="input__form" name="password_confirmation" required autocomplete="new-password" placeholder="確認用パスワード">
        <p id="password__re__error"></p>

        
        <button class="submit__button" type="submit" name="submit">会員登録</button>
    </div>
</form>
<div class="login">
    <p>アカウントをお持ちの方はこちらから</p>
    @if (Route::has('login'))
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                            @endif
</div>
    </div>

</main>

<div class="footer">
    <small>Atte, inc.

</div>




</body>

@endsection

