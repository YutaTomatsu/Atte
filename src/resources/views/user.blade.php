<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
    <title>Document</title>
</head>
<body>
<header>
    <h2 class="left__side">Atte</h2>
    <div class="right__side">
        <a class="header__item" href="{{ route('user') }}">ユーザー一覧</a>
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

    <h1>Users</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>勤怠一覧</th>

            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><a class="attendance" href="{{route('userattendance', ['id' => $user->id])}}">勤怠表</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>

<div class="footer">
    <small>Atte, inc.

</div>

</body>

</html>