<?php

use Illuminate\Support\Facades\Route;
use QuizzyTimes\Front\Ads\Http\Controllers\AdsController;
use QuizzyTimes\Front\Home\Http\Controllers\HomeController;
use QuizzyTimes\Front\Quiz\Http\Controllers\QuizCategoryShowController;
use QuizzyTimes\Front\Quiz\Http\Controllers\QuizShowController;


Route::get('/', HomeController::class)->name('home');
Route::get('categories/{slug}', QuizCategoryShowController::class)->name('quiz-category.show');
Route::get('/{slug}', QuizShowController::class)->name('quiz.show');

//Ads
Route::get('/ads/sidebar', [AdsController::class, 'sidebarBanner'])->name('ads.sidebar');
Route::get('/ads/top', [AdsController::class, 'topBanner'])->name('ads.top');
Route::get('/ads/square', [AdsController::class, 'squareBanner'])->name('ads.square-');
