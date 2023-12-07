<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleControllerDashboard;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// artikel
Route::get('/', [ArticleController::class, 'article'])->name('article');
Route::get('/user/article/{id}', [ArticleController::class, 'userArticle'])->name('user.article');
Route::get('/detail/artikel/{id}', [ArticleController::class, 'detail'])->name('detail.artikel');
Route::get('/semua/artikel', [ArticleController::class, 'allArtikel'])->name('semua.artikel')->middleware('auth');
Route::get('/detailComment/{id}', [ArticleController::class, 'detailComment'])->name('detail.comment');

// dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ArticleControllerDashboard::class, 'dashboard'])->name('dashboard');
    Route::get('/articles', [ArticleControllerDashboard::class, 'index'])->name('articles.index');
    Route::get('/articles/show/{id}', [ArticleControllerDashboard::class, 'show'])->name('articles.show');
    Route::get('/articles/edit/{id}', [ArticleControllerDashboard::class, 'edit'])->name('articles.edit');
    // Menyimpan artikel baru
    Route::post('/articles', [ArticleControllerDashboard::class, 'store'])->name('articles.store');
    Route::get('/data/create', [ArticleControllerDashboard::class, 'create'])->name('artikel.create');
    // Memproses pembaruan data artikel
    Route::post('/articles/{id}/update', [ArticleControllerDashboard::class, 'update'])->name('articles.update');
    Route::delete('/articles/{id}', [ArticleControllerDashboard::class, 'destroy'])->name('articles.destroy');
    // Comment route
    Route::post('/articles/{id}/comment', [ArticleController::class, 'commentStore'])->name('articles.commentStore');
});

// login
// routes/web.php
use App\Http\Controllers\AuthController;

// Login routes
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginprocess'])->name('store.login');

Route::get('/register' , [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register/process' , [AuthController::class, 'registerprocess'])->name('registerprocess');

Route::get('/logout', [AuthController::class, 'logout']);

