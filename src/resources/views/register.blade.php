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
<form class="form" action="/email/verify" method="get">
    @csrf
    <div class="form__input">
        <input class="input__form" type="text" name="name" id="name" placeholder="名前" value="{{ old('name') }}" >
        <p id="name__error"></p>
        <input class="input__form" type="email" name="email" id="email" placeholder="メールアドレス" value="{{ old('email') }}">
        <p id="email__error"></p>
        <input class="input__form" type="password" name="password" id="password" placeholder="パスワード" value="{{ old('password') }}">
        <p id="password__error"></p>
        <input class="input__form" type="password" name="password__re" id="password__re" placeholder="確認用パスワード" value="{{ old('password__re') }}">
        <p id="password__re__error"></p>
        <button class="submit__button" type="submit" name="submit">会員登録</button>
    </div>
</form>
<div class="login">
    <p>アカウントをお持ちの方はこちらから</p>
    <a href="">ログイン</a>
</div>
    </div>

</main>

<div class="footer">
    <small>Atte, inc.

</div>




</body>

</html>