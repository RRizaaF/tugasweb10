<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Models\Article;

Route::get('/', function () {
    $articles = Article::all(); // Ambil semua data dari tabel articles
    return view('crud', compact('articles'));
});

Route::get('/', [ArticleController::class, 'show'])->name('article.index'); // Rute untuk menampilkan daftar artikel
Route::post('/crud', [ArticleController::class, 'store'])->name('post_store'); // Rute untuk menyimpan artikel