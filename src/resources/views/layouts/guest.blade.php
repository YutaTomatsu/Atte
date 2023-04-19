





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <title>Document</title>

</head>
<body>
<header>
    <h2>Atte</h2>
</header>

<main>
    <div class="form__content">
    <h2 class="registe__title">ログイン</h2>
    <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form__input">
        <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="input__form" type="email" name="email" :value="old('email')" required autofocus />
            </div>
        <p id="email__error"></p>
        <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="input__form"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>
        <p id="password__error"></p>

        <button class="submit__button" type="submit" name="submit">ログイン</button>
        <label for="remember_me" class="remember">
                    <input id="remember_me" type="checkbox" name="remember" class="checkbox">
                    <label for="remember_me" >{{ __('Remember me') }}</label>
                </label>
    </div>
            
</form>
@if (Route::has('password.request'))
                    <a class="forgot" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

<div class="login">
    <p>アカウントをお持ちでない方はこちらから</p>
    <a href="{{ route('register') }}">会員登録</a>
</div>
    </div>

    <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>


</main>

<div class="footer">
    <small>Atte, inc.

</div>




</body>

</html>