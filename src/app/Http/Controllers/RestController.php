<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Attendance;

class RestController extends Controller
{
     private $working = false; // 勤務中かどうかを示すフラグ

    public function start()
    {
        if (!$this->working) {
            return redirect()->back()->with('error', 'この操作は勤務中のみ実行可能です');
        }

        $rest = Rest::where('attendance_id', Auth::id())->orderBy('id', 'desc')->first();
        
        // すでに開始された休憩がある場合
        if ($rest && !$rest->end_time) {
            return redirect()->back()->with('error', '既に休憩を開始しています');
        }

        $newRest = new Rest;
        $newRest->attendance_id = Auth::id();
        $newRest->start_time = Carbon::now();
        $newRest->save();

        return redirect()->back()->with(['start_disabled' => true, 'end_disabled' => false]);
    }

    public function end()
    {
        if (!$this->working) {
            return redirect()->back()->with('error', 'この操作は勤務中のみ実行可能です');
}
    $rest = Rest::where('attendance_id', Auth::id())->orderBy('id', 'desc')->first();

    // 休憩が開始されていない場合
    if (!$rest || $rest->end_time) {
        return redirect()->back()->with('error', '既に休憩を終了しています');
    }

    $rest->end_time = Carbon::now();
    $rest->save();

    return redirect()->back()->with(['start_disabled' => false, 'end_disabled' => true]);
}

public function __construct()
    {
        // コンストラクターで勤務中かどうかを設定する
        $this->middleware(function ($request, $next) {
            $this->working = $this->working();
            return $next($request);
        });
    }


private function working()
{
    $userId = Auth::id();
    $today = Carbon::now()->toDateString();

    $attendance = Attendance::where('user_id', $userId)
                            ->whereDate('created_at', $today)
                            ->whereNull('end_time')
                            ->first();

    return $attendance ? true : false;
}
}


