<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Payment Routes
|--------------------------------------------------------------------------
|
| The payer-facing pages are auth-gated: a payment reference alone must
| not be enough to see instructions or confirm a transfer, because the
| reference is what a webhook echoes back.
|
| The webhook is a public provider callback and lives in routes/api.php,
| which is CSRF-exempt by default in Laravel 11.
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/payments/{reference}', [PaymentController::class, 'show'])
        ->where('reference', '[A-Za-z0-9\-]+')
        ->name('payments.show');

    // Rate limited because this is the manual gateway's only settlement
    // path — an unguarded POST here would let anyone self-approve. The
    // limit itself is the named 'payment' limiter (AppServiceProvider), so
    // it can be retuned without editing this file.
    Route::middleware('throttle:payment')->group(function () {
        Route::post('/payments/{reference}/confirm', [PaymentController::class, 'confirm'])
            ->where('reference', '[A-Za-z0-9\-]+')
            ->name('payments.confirm');
    });
});

// Guest donation receipts. The signature is the authorisation — the
// payer has no session, and the link stops working after 6 hours.
Route::get('/payments/guest/{reference}', [PaymentController::class, 'guestShow'])
    ->where('reference', '[A-Za-z0-9\-]+')
    ->middleware('signed')
    ->name('payment.guest.receipt');
