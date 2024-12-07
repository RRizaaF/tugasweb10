<?php

// use App\Http\Controllers\ArticleController;
// use Illuminate\Support\Facades\Route;
// use App\Models\Article;

// Route::get('/', function () {
//     return view('crud');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

// Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');


// Route::post('/store', [ArticleController::class, 'store'])->name('articles.store');


// Route::get('/show', [ArticleController::class, 'show'])->name('articles.show');


// Route::get('/edit/{article}', [ArticleController::class, 'edit'])->name('articles.edit');

// Route::put('/update/{article}', [ArticleController::class, 'update'])->name('articles.update');

// Route::delete('/delete/{article}', [ArticleController::class, 'destroy'])->name('articles.delete');


use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Http\Kernel;

Route::get('/showLogin', [LoginController::class, 'showLoginForm'])->name('showLogin');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Semua rute dengan middleware 'auth'
Route::middleware('auth')->group(function () {
    // Rute untuk semua role
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/show', [ArticleController::class, 'show'])->name('articles.show');

    // Rute untuk role writer
    Route::middleware('check.role:writer')->group(function () {
        Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');
        Route::post('/store', [ArticleController::class, 'store'])->name('articles.store');
    });

    // Rute untuk role admin
    Route::middleware('check.role:admin')->group(function () {
        Route::get('/edit/{article}', [ArticleController::class, 'edit'])->name('articles.edit');
        Route::put('/update/{article}', [ArticleController::class, 'update'])->name('articles.update');
        Route::delete('/delete/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
    });
});

// Rute otentikasi
// require __DIR__ . '/auth.php';
