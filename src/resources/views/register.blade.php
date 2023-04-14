<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
    <title>Document</title>

<script>
function validateForm() {
  // フォームの各入力欄の値を取得する
  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;
  const password__re = document.getElementById("password__re").value;
  
  // バリデーションチェック
  const nameError = document.getElementById("name__error");
  if (name === "") {
    nameError.textContent = "名前は必須です。";
    return false;
  } else if (name.length > 191) {
    nameError.textContent = "名前は最大191文字までです。";
    return false;
  } else {
    nameError.textContent = "";
  }

  const emailError = document.getElementById("email__error");
  if (email === "") {
    emailError.textContent = "メールアドレスは必須です。";
    return false;
  } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    emailError.textContent = "正しいメールアドレスを入力してください。";
    return false;
  } else if (email.length > 191) {
    emailError.textContent = "メールアドレスは最大191文字までです。";
    return false;
  } else {
    emailError.textContent = "";
  }

  const passwordError = document.getElementById("password__error");
  if (password === "") {
    passwordError.textContent = "パスワードは必須です。";
    return false;
  } else if (password.length < 8 || password.length > 16) {
    passwordError.textContent = "パスワードは8文字以上、16文字以内で入力してください。";
    return false;
  } else if (!/^[0-9a-zA-Z]+$/.test(password)) {
    passwordError.textContent = "パスワードは半角英数字で入力してください。";
    return false;
  } else {
    passwordError.textContent = "";
  }

  const passwordReError = document.getElementById("password__re__error");
  if (password__re === "") {
    passwordReError.textContent = "確認用パスワードを入力してください。";
    return false;
  } else if (password !== password__re) {
    passwordReError.textContent = "パスワードが一致しません。";
    return false;
  } else {
    passwordReError.textContent = "";
  }

  return true;
}
</script>

</head>
<body>
<header>
    <h2>Atte</h2>
</header>

<main>
    <div class="form__content">
    <h2 class="registe__title">会員登録</h2>
<form class="form" action="/register" method="post" onsubmit="return validateForm()">
    @csrf
    <div class="form__input">
        <input class="input__form" type="text" name="name" id="name" placeholder="名前" value="{{ old('name') }}">
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