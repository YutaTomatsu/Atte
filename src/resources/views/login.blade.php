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
    <h2 class="registe__title">ログイン</h2>
<form class="form" action="/login" method="post">
    @csrf
    <div class="form__input">
        <input class="input__form" type="email" name="email" id="email" placeholder="メールアドレス" value="{{ old('email') }}">
        <p id="email__error"></p>
        <input class="input__form" type="password" name="password" id="password" placeholder="パスワード" value="{{ old('password') }}">
        <p id="password__error"></p>

        <button class="submit__button" type="submit" name="submit">ログイン</button>
    </div>
</form>
<div class="login">
    <p>アカウントをお持ちでない方はこちらから</p>
    <a href="{{ route('register') }}">会員登録</a>
</div>
    </div>

</main>

<div class="footer">
    <small>Atte, inc.

</div>




</body>

</html>