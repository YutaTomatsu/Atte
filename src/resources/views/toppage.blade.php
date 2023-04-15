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
    <button class="button2" type="submit" id="start_disabled" name="rest__start" @if(isset($start_disabled) && $start_disabled) disabled @endif>休憩開始 </button>
</form>

<form method="post" action="rest/end" >
    @csrf
    <button class="button1" type="submit" id="end_disabled" name="rest__end" @if(isset($end_disabled) && $end_disabled) disabled @endif>休憩終了</button>
</form>
  </div>

</main>

<div class="footer">
    <small>Atte, inc.

</div>



<script>
function (clickBtn1){
	
	if (document.getElementById("b1").disabled === false){
		// disabled属性を削除
    document.getElementById("b1").setAttribute("disabled", true);
		document.getElementById("b2").removeAttribute("disabled");
		document.getElementById("b2").style.color = "black";
    document.getElementById("b1").style.color = "White";
   document.forms[3].submit();

  }else{
		// disabled属性を削除
		document.getElementById("b1").removeAttribute("disabled");
		document.getElementById("b1").style.color = "black";
		// disabled属性を設定
		document.getElementById("b2").setAttribute("disabled", true);
		document.getElementById("b2").style.color = "White";
    document.forms[4].submit();
	}
}


</script>

<script>
    // 休憩開始ボタンが押されたとき
    $('form[action="rest/start"]').submit(function (event) {
        event.preventDefault();

        $.post($(this).attr('action'), $(this).serialize(), function (data) {
            // ボタンのdisabled属性を更新する
            $('#b1').prop('disabled', true);
            $('#b2').prop('disabled', false);
        }).fail(function () {
            alert('エラーが発生しました');
        });
    });

    // 休憩終了ボタンが押されたとき
    $('form[action="rest/end"]').submit(function (event) {
        event.preventDefault();

        $.post($(this).attr('action'), $(this).serialize(), function (data) {
            // ボタンのdisabled属性を更新する
            $('#b1').prop('disabled', false);
            $('#b2').prop('disabled', true);
        }).fail(function () {
            alert('エラーが発生しました');
        });
    });
</script>







</body>

</html>