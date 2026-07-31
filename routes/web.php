<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormController;

// Rute-rute untuk autentikasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute-rute yang perlu autentikasi
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');


    Route::get('/contact', [ContactFormController::class, 'showForm'])->name('contact.form');
    Route::post('/contact', [ContactFormController::class, 'store'])->name('contact.store');
    

    Route::get('/blogspot', function () {
        return view('blogspot');
    })->name('blogspot');
});

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
