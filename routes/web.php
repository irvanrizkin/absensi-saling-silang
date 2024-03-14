<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;

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

Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
Route::get('/attendance/create', [AttendanceController::class, 'store'])->name('attendance.create');

Route::get('/attendance/entry', [AttendanceController::class, 'showEntryAttendance']);
Route::get('/attendance/exit', [AttendanceController::class, 'showExitAttendance']);

Route::post('/attendance/entry', [AttendanceController::class, 'entryAttendance'])->name('attendance.entry');
Route::post('/attendance/exit', [AttendanceController::class, 'exitAttendance'])->name('attendance.exit');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
