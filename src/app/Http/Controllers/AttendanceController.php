<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    private $working = false; // 勤務中かどうかを示すフラグ

    public function start(Request $request)
    {
        $userId = $request->user()->id;
        $today = now()->toDateString();

        $attendance = Attendance::where('user_id', $userId)
                                ->whereDate('created_at', $today)
                                ->first();

        if ($attendance) {
            return redirect()->back()->with('error', 'すでに出勤済みです');
        }

        $attendance = new Attendance();
        $attendance->user_id = $userId;
        $attendance->start_time = now();
        $attendance->save();

        $this->working = true; // 勤務中に設定

        return redirect()->back()->with('success', '出勤しました');
    }

    public function end(Request $request)
    {

        $userId = $request->user()->id;
        $today = now()->toDateString();

        $attendance = Attendance::where('user_id', $userId)
                                ->whereDate('created_at', $today)
                                ->whereNull('end_time')
                                ->first();

        if (!$attendance) {
            return redirect()->back()->with('error', '退勤できませんでした');
        }

        $attendance->end_time = now();
        $attendance->save();

        $this->working = false; // 勤務中を解除

        return redirect()->back()->with('success', '退勤しました');
    }
}


