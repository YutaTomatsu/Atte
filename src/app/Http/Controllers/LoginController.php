<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    public function login(Request $request)
    {
       return view('login');
    }

    public function store(Request $request)
{
    // POSTリクエストが送信されたかどうかを確認する
    if ($request->isMethod('post')) {
        $email = $request->input('email');
        $password = $request->input('password');

        // 現在ログインされているかどうかを確認する
        if (Auth::check()) {
            return redirect()->route('toppage');
        }

        // ユーザーをメールアドレスに基づいて検索する
        $user = User::where('email', $email)->first();

        // ユーザーが存在し、パスワードが正しい場合はログインセッションを開始する
        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user);
            return redirect()->route('toppage');
        } else {
            return redirect()->back()->with('error', 'メールアドレスまたはパスワードが違います。');
        }
    }

    

    return view('login');
}

public function logout(Request $request)
{
    Auth::logout();
    return view('login');
}

  
}
