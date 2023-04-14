<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RestController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {return view('welcome');
});
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'store']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/attendance/start', [AttendanceController::class, 'start']);
Route::post('/attendance/end', [AttendanceController::class, 'end']);

Route::post('/rest/start', [RestController::class, 'start']);
Route::post('/rest/end', [RestController::class, 'end']);

Route::get('/date', [DateController::class, 'index'])->name('date');
Route::get('/toppage',[HomeController::class, 'index'] )->name('toppage');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/date/previous', 'DateController@previous')->name('date.previous');
Route::get('/date/next', 'DateController@next')->name('date.next');