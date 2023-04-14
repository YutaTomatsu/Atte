<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/toppage.css') }}" />
    <title>Document</title>
</head>
<body>
<header>
    <h2 class="left__side">Atte</h2>
    <div class="right__side">
        <a class="header__item" href="{{ route('toppage') }}">ホーム</a>
        <a class="header__item"  href="{{ route('date') }}">日付一覧</a>
        <a class="header__item" href="{{ route('logout') }}" >ログアウト</a>
            <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
    @csrf
</form>
    </div>
</header>



<div class="footer">
    <small>Atte, inc.

</div>


</body>

</html>