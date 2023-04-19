<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;

class UserController extends Controller
{
    public function user()
{
    $users = User::all();
    return view('user', compact('users'));
}
}
