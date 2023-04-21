<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/date.css') }}" />
    <title>Document</title>
</head>
<body>
<header>
    <h2 class="left__side">Atte</h2>
    <div class="right__side">
        <a class="header__item" href="{{ route('user') }}">ユーザー一覧</a>
        <a class="header__item" href="{{ route('toppage') }}">ホーム</a>
        <a class="header__item" href="{{ route('date') }}">日付一覧</a>
        <div class=header__item>
        <form class="logout" method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" class="header__item"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                ログアウト
                            </x-dropdown-link>
                        </form>
        </div>
        
    </div>
</header>


<main>

<div class="nav-links">
    <a class="nav__btn" href="{{ route('date', ['date' => $prev_date]) }}">&lt;</a>
    <span>{{ $date }}</span>
    <a class="nav__btn" href="{{ route('date', ['date' => $next_date]) }}">&gt;</a>
  </div>

<table class="table__table">
    
    <thead>
        <tr>
            <th>名前</th>
            <th>勤務開始</th>
            <th>勤務終了</th>
            <th>休憩時間</th>
            <th>勤務時間</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
       
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ date('H:i', strtotime($user->start_time)) }}</td>
                <td>{{ $user->end_time ? date('H:i', strtotime($user->end_time)) : '' }}</td>
                <td>{{ $user->rest_time ??($user->work_time?'00:00:00':'')}}</td>
                <td>{{ $user->work_time }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $users->appends(request()->query())->links('bootstrap-4') }}
</main>

<div class="footer">
    <small>Atte, inc.

</div>

</body>

</html>