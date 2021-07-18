<?php

use Illuminate\Support\Facades\Route;
use QuizzyTimes\Front\Home\Http\Controllers\HomeController;
use QuizzyTimes\Front\Quiz\Http\Controllers\QuizCategoryShowController;
use QuizzyTimes\Front\Quiz\Http\Controllers\QuizShowController;


Route::get('/', HomeController::class)->name('home');
Route::get('categories/{slug}', QuizCategoryShowController::class)->name('quiz-category.show');
Route::get('/{slug}', QuizShowController::class)->name('quiz.show');
