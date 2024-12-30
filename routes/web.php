<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [MyController::class, 'index'])->middleware('auth')->name('home');
Route::get('home/about', [MyController::class, 'about'])->name('about');

Route::get('/home/sport', [MyController::class, 'sport'])->middleware('auth')->name('kategori.sport');
Route::get('/home/finance', [MyController::class, 'finance'])->middleware('auth')->name('kategori.finance');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
Route::post('/articles/{id}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/admin/articles', [ArticleController::class, 'index'])->name('admin.articles.index');
Route::post('/admin/articles', [ArticleController::class, 'store'])->name('admin.articles.store');
Route::patch('/admin/articles/{article}', [ArticleController::class, 'update'])->name('admin.articles.update');
Route::delete('/admin/articles/{article}', [ArticleController::class, 'destroy'])->name('admin.articles.destroy');
