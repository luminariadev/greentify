<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Provider callback. Public by necessity and CSRF-exempt because it
// lives in the API stack; the amount check inside the controller is what
// stops a forged "paid" from settling a payment.
Route::post('/payments/webhook', [PaymentController::class, 'webhook'])->name('api.payments.webhook');

// Public API routes
Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);

// Protected API routes (requires token)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [ApiAuthController::class, 'logout']);

    // Protected Article routes (e.g., for creating/editing by authenticated users)
    // Route::post('/articles', [ArticleController::class, 'store']);
    // Route::put('/articles/{article}', [ArticleController::class, 'update']);
    // Route::delete('/articles/{article}', [ArticleController::class, 'destroy']);
});

// Public Article & Category routes
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/{article}', [ArticleController::class, 'show']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);
