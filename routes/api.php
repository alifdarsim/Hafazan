<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookmarkController;
use App\Http\Controllers\Api\ProgressController;
use App\Http\Controllers\Api\TimelineController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['api'])->group(function() {

    Route::prefix('auth')->group(function() {
        Route::post('/login', [AuthController::class, 'login'])->name('api.login');
        Route::post('/register', [AuthController::class, 'register'])->name('api.register');
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::get('/user-profile', [AuthController::class, 'userProfile']);
    });

    Route::prefix('progress')->group(function() {
        Route::post('/', [ProgressController::class, 'index']);
        Route::post('/store', [ProgressController::class, 'store']);
    });

    Route::prefix('bookmark')->group(function() {
        Route::get('/{surah}', [BookmarkController::class, 'index']);
        Route::get('/key/{key}', [BookmarkController::class, 'key']);
        Route::delete('/{id}', [BookmarkController::class, 'delete']);
        Route::post('/store', [BookmarkController::class, 'store']);
    });

    Route::prefix('timeline')->group(function() {
        Route::get('/', [TimelineController::class, 'index']);
        Route::delete('/{id}', [TimelineController::class, 'delete']);
    });

});