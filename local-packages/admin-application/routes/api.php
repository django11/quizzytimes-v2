<?php

use Illuminate\Support\Facades\Route;
use QuizzyTimes\Admin\Auth\Http\Controllers\AuthController;
use QuizzyTimes\Admin\Auth\Http\Controllers\AuthenticatedUserController;

Route::prefix('admin/api')->middleware(['api'])->group(static function() {
    Route::post('login', AuthController::class);
});

Route::prefix('admin/api')->middleware(['api', 'auth:sanctum'])->group(static function() {
    Route::prefix('user')->group(static function() {
        Route::get('/', AuthenticatedUserController::class);
    });
});
