<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RestController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserAttendanceController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::post('attendance/start',[AttendanceController::class, 'start']);
Route::post('attendance/end',[AttendanceController::class, 'end']);
Route::post('rest/start',[RestController::class, 'start']);
Route::post('rest/end',[RestController::class, 'end']);

Route::get('/date',[DateController::class, 'index'])->name('date');
Route::get('/toppage',[HomeController::class, 'toppage'])->name('toppage');
Route::get('/user',[UserController::class, 'user'])->name('user');
Route::get('/userattendance',[UserAttendanceController::class, 'userattendance'])->name('userattendance');