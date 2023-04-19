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

<main>
  <h2 class="otsukare">{{ Auth::user()->name }}さんお疲れ様です！</h2>
  <div class="error">
  @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
  @endif
  </div>
  <div class="job">
<form method="post" action="attendance/start">
    @csrf
    <button class="button1" type="submit" name="job__start" >勤務開始</button>
</form>

<form method="post" action="attendance/end" >
    @csrf
    <button class="button2" type="submit" name="job__end" >勤務終了</button>
</form>
  </div>

  <div class="rest">





    <form method="post" action="rest/start" >
    @csrf
    <button class="button2" type="submit" id="b1" name="rest__start" @if(isset($start_disabled) && $start_disabled) disabled @endif onclick="clickBtn1()">休憩開始 </button>
</form>

<form method="post" action="rest/end" >
    @csrf
    <button class="button1" type="submit" id="b2" name="rest__end" @if(isset($end_disabled) && $end_disabled) disabled @endif onclick="tclickBtn1()">休憩終了</button>
</form>
  </div>

</main>

<div class="footer">
    <small>Atte, inc.

</div>



<script>
function clickBtn1(){
    if (document.getElementById("b1").disabled === false){
        document.forms[2].submit();
        document.getElementById("b1").setAttribute("disabled", true);
        document.getElementById("b2").removeAttribute("disabled");
        document.getElementById("b2").style.color = "black";
        document.getElementById("b1").style.color = "white";
    }else{
        document.forms[3].submit();
        document.getElementById("b1").removeAttribute("disabled");
        document.getElementById("b1").style.color = "black";
        document.getElementById("b2").setAttribute("disabled", true);
        document.getElementById("b2").style.color = "white";
    }
}
</script>








</body>

</html>