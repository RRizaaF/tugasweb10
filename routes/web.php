<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('crud');
});

Route::post('crud', [ArticleController::class, 'store'])->name('post_store');