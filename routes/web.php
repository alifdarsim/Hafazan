<?php

use App\Http\Controllers\Web\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\SurahController;
use App\Http\Controllers\Web\HistoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name('web.login');
Route::get('/register', [AuthController::class, 'register'])->name('web.register');
Route::get('/logout', [AuthController::class, 'logout'])->name('web.logout');

Route::middleware(['jwt.guard'])->group(function() {
    Route::get('/home', [DashboardController::class, 'Dashboard'])->name('dashboard');
    Route::get('/surah', [SurahController::class, 'Surah'])->name('surah');
    Route::get('/surah/{id}', [SurahController::class, 'SurahById'])->name('surah.id');
    Route::get('/history', [HistoryController::class, 'index'])->name('history');
});