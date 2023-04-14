@extends('layouts.app')
  <link rel="stylesheet" href="{{ asset('css/login.css') }}" />

  <script>
function validateForm() {
  // フォームの各入力欄の値を取得する
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;
  
  // バリデーションチェック


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
}
</script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <header>
                <h2 class="header__title" >Atte</h2>
                </header>
                <main>
                <h2 class="main__title">ログイン</h2>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <div class="form__error">
                                <input class="form__item" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス">
                               <p id="email__error"></p>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <div class="form__error">
                                <input class="form__item" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="パスワード">
                              <p id="password__error"></p>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('パスワードを記憶する') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="rowmb-0">
                            <div class="col-md-8 offset-md-4">
                                <button class="form__button" type="submit" class="btn btn-primary">
                                    {{ __('ログイン') }}
                                </button>
                               
                                    <p class="anounce">アカウントをお持ちで無い方はこちら</p>
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('会員登録') }}</a>
                                
                            
                            </div>
                        </div>
                    </form>
                </div>
               </main>
               <footer class="footer">
                <small>Atte,inc.</small>
               </footer>
            </div>
        </div>
    </div>
</div>
@endsection

