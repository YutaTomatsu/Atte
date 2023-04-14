<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;

class DateController extends Controller
{
    public function index()
    {
        $date = request()->query('date', date('Y-m-d'));
        $prev_date = Carbon::parse($date)->subDay()->toDateString();
        $next_date = Carbon::parse($date)->addDay()->toDateString();

        $users = DB::table('users')
            ->select('users.name',
                'attendances.start_time',
                'attendances.end_time',
                'attendances.created_at',
                DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(rests.end_time) - TIME_TO_SEC(rests.start_time))) AS rest_time'),
                DB::raw('SEC_TO_TIME(TIME_TO_SEC(attendances.end_time) - TIME_TO_SEC(attendances.start_time) - SUM(TIME_TO_SEC(CASE WHEN rests.end_time IS NULL THEN 0 ELSE rests.end_time END) - TIME_TO_SEC(CASE WHEN rests.start_time IS NULL THEN 0 ELSE rests.start_time END))) AS work_time'),
                DB::raw("DATE_FORMAT(attendances.created_at, '%Y-%m-%d') as date"))
            ->join('attendances', 'users.id', '=', 'attendances.user_id')
            ->leftJoin('rests', 'attendances.id', '=', 'rests.attendance_id')
            ->whereDate('attendances.created_at', $date)
            ->groupBy('date', 'users.id', 'attendances.id')
            ->orderBy('date', 'desc')
            ->paginate(5, ['*'], 'page', request()->query('page'));

        $users->appends(['date' => $date])->links();

        return view('date', compact('users', 'prev_date', 'next_date', 'date'));
    }
}
