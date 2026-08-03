<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleInteractionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public pages
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/contact', [ContactFormController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactFormController::class, 'store'])->name('contact.store');

// Blogspot - dynamic articles index
Route::get('/blogspot', [ArticleController::class, 'index'])->name('blogspot');

// Category pages - static for now (can be dynamic later)
Route::get('/limbah', function () {
    return view('blog.limbah');
})->name('limbah');

Route::get('/konservasi', function () {
    return view('blog.konservasi');
})->name('konservasi');

Route::get('/penghijauan', function () {
    return view('blog.penghijauan');
})->name('penghijauan');

Route::get('/hutan', function () {
    return view('blog.hutan');
})->name('hutan');

// Articles CRUD (auth required for create/edit/delete)
Route::middleware('auth')->group(function () {
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/my-articles', [ArticleController::class, 'myArticles'])->name('articles.my');
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});

// Public article show (no auth) - uses slug binding
Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');

// Comments
Route::middleware('auth')->group(function () {
    Route::post('/articles/{article}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/comments/{comment}/reply', [CommentController::class, 'reply'])->name('comments.reply');
});

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.user');
});

// Article interactions (Like & Bookmark)
Route::middleware('auth')->group(function () {
    Route::post('/articles/{article:slug}/like', [ArticleInteractionController::class, 'toggleLike'])->name('articles.like');
    Route::post('/articles/{article:slug}/bookmark', [ArticleInteractionController::class, 'toggleBookmark'])->name('articles.bookmark');
    Route::get('/bookmarks', [ArticleInteractionController::class, 'indexBookmarks'])->name('bookmarks.index');
});

// Follow interaction
Route::middleware('auth')->group(function () {
    Route::post('/users/{user}/follow', [FollowController::class, 'toggleFollow'])->name('users.follow');
});