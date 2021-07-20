<?php

use Illuminate\Support\Facades\Route;

Route::view('admin/{any}', 'quizzytimes-admin::pages.index');
//Route::get('admin/{any}', function () {
//    dd($_SERVER);
//});
