<?php
namespace App\Http\Middleware;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Http\Kernel;
use App\Http\Middleware\CheckRole;


Route::get('/showLogin', [LoginController::class, 'showLoginForm'])->name('showLogin');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Semua rute dengan middleware 'auth'
Route::middleware('auth')->group(function () {
    // Rute untuk semua role
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/show', [ArticleController::class, 'show'])->name('articles.show');
    Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/store', [ArticleController::class, 'store'])->name('articles.store');

    

    
    Route::middleware('role_has_permission:edit articles')->group(function () {
        Route::get('/edit/{article}', [ArticleController::class, 'edit'])->name('articles.edit');
        Route::put('/update/{article}', [ArticleController::class, 'update'])->name('articles.update');
    });

    Route::middleware('role_has_permission:delete articles')->group(function () {
        Route::delete('/delete/{article}', [ArticleController::class, 'destroy'])->name('articles.delete');
    });
});

// Rute otentikasi
// require __DIR__ . '/auth.php';
