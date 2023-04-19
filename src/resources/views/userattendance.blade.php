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
        <a class="header__item" href="{{ route('toppage') }}">ホーム</a>
        <a class="header__item"  href="{{ route('date') }}">日付一覧</a>
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
        <a class="nav__btn" href="{{ route('date', ['date' => $prev_date, 'user_id' => request()->query('user_id')]) }}">&lt;</a>
        <span>{{ $date }}</span>
        <a class="nav__btn" href="{{ route('date', ['date' => $next_date, 'user_id' => request()->query('user_id')]) }}">&gt;</a>
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
            @foreach($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->name }}</td>
                    <td>{{ date('H:i', strtotime($attendance->start_time)) }}</td>
                    <td>{{ $attendance->end_time ? date('H:i', strtotime($attendance->end_time)) : '' }}</td>
                    <td>{{ $attendance->rest_time }}</td>
                    <td>{{ $attendance->work_time }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $attendances->appends(request()->query())->links('bootstrap-4') }}
</main>

<div class="footer">
    <small>Atte, inc.

</div>

</body>

</html>