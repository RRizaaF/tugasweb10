<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Models\Article;

Route::get('/', function () {
    return view('crud');
});

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');

// Menyimpan artikel baru
Route::post('/store', [ArticleController::class, 'store'])->name('articles.store');

// Menampilkan detail artikel
Route::get('/show', [ArticleController::class, 'show'])->name('articles.show');

// Menampilkan form edit artikel
Route::get('/edit/{article}', [ArticleController::class, 'edit'])->name('articles.edit');

Route::put('/update/{article}', [ArticleController::class, 'update'])->name('articles.update');

Route::delete('/delete/{article}', [ArticleController::class, 'destroy'])->name('articles.delete');
