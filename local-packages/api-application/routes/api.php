<?php

use Illuminate\Support\Facades\Route;
use QuizzyTimes\Api\Quiz\Http\Controllers\QuizShowController;

Route::prefix('api')->middleware(['api'])->group(static function() {
    Route::prefix('quizzes')->group(static function() {
        Route::get('{id}', QuizShowController::class);
    });
});
