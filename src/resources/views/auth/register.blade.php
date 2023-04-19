
       



            

            
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
    <title>Document</title>

</head>
<body>
<header>
    <h2>Atte</h2>
</header>

<main>
    <div class="form__content">
    <h2 class="register__title">会員登録</h2>
    @if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
@endif
<!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
<form class="form" method="POST" action="{{ route('register') }}">
            @csrf
    <div class="form__input">
        <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="input__form" type="text" name="name" :value="old('name')" required autofocus />
            </div>

        <p id="name__error"></p>
        <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="input__form" type="email" name="email" :value="old('email')" required />
            </div>

        <p id="email__error"></p>
        <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="input__form"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>
        <p id="password__error"></p>
        <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="input__form"
                                type="password"
                                name="password_confirmation" required />
            </div>
        <p id="password__re__error"></p>
        <button class="submit__button" type="submit" name="submit">会員登録</button>
    </div>
</form>
<div class="login">
    <p>アカウントをお持ちの方はこちらから</p>
    <a href="{{ route('login') }}">ログイン</a>
</div>
    </div>

</main>

<div class="footer">
    <small>Atte, inc.

</div>




</body>

</html>


