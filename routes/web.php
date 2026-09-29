<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\Admin\PaymentReviewController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleInteractionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SponsoredPostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| RESTORASI 2026-09-26 — file ini sempat tertimpa placeholder API-docs saja
| pada commit 4dcb7e3 (13 Agu 2026), sehingga seluruh route web (landing,
| auth, artikel, komentar, marketplace, membership, donasi, admin) hilang
| dan 21 feature test gagal dengan 404. Seluruh definisi route di bawah
| dipulihkan dari commit ec27b03 lalu dirapikan (duplikat & urutan group).
|
*/

// Auth
// Every credential surface is throttled by a named limiter declared in
// AppServiceProvider. Login is limited per email+IP so a shared NAT is not
// punished for a few typos, while credential stuffing against one account
// is. The login redirect target was a dead '/welcome' URL and is fixed in
// its own commit.
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:login');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public pages
Route::get('/', fn () => view('landing'))->name('welcome');

Route::get('/contact', [ContactFormController::class, 'showForm'])->name('contact.form');
// Low limit and no identity to rate on: this writes to a shared inbox and
// is otherwise an open mail relay.
Route::post('/contact', [ContactFormController::class, 'store'])
    ->middleware('throttle:public-submit')
    ->name('contact.store');

// Marketplace (Green Affiliate)
Route::get('/marketplace', [MarketplaceController::class, 'index'])->name('marketplace.index');
Route::get('/marketplace/{product}', [MarketplaceController::class, 'show'])->name('marketplace.show');

// Membership — the pricing table is a public marketing page; only the
// account-bound actions need auth (a login wall on the price list means
// nobody can ever see what they would be paying for).
Route::get('/membership/pricing', [MembershipController::class, 'pricing'])->name('membership.pricing');

Route::middleware('auth')->group(function () {
    Route::get('/membership', [MembershipController::class, 'status'])->name('membership.status');
    Route::post('/membership/subscribe/{tier}', [MembershipController::class, 'subscribe'])->name('membership.subscribe');
    Route::post('/membership/cancel', [MembershipController::class, 'cancel'])->name('membership.cancel');
});

// Ads
Route::get('/ads/{ad}/click', [AdController::class, 'trackClick'])->name('ads.click');

// Sponsored Posts
Route::get('/sponsored', [SponsoredPostController::class, 'index'])->name('sponsored.index');
Route::get('/sponsored/{sponsoredPost:slug}', [SponsoredPostController::class, 'show'])->name('sponsored.show');

// Donations
Route::get('/donasi', [DonationController::class, 'index'])->name('donation.index');
Route::post('/donasi', [DonationController::class, 'store'])->name('donation.store');

// Newsletter
// Subscribe and unsubscribe both write to the shared mailing list; an
// attacker could otherwise sign someone else's address up to spam them.
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])
    ->middleware('throttle:public-submit')
    ->name('newsletter.subscribe');
Route::get('/newsletter/unsubscribe', [NewsletterController::class, 'showUnsubscribeForm'])->name('newsletter.unsubscribe.page');
Route::post('/newsletter/unsubscribe', [NewsletterController::class, 'unsubscribe'])
    ->middleware('throttle:public-submit')
    ->name('newsletter.unsubscribe');

// Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/newsletter/send', [NewsletterController::class, 'send'])->name('admin.newsletter.send');

    // Manual-gateway settlement. The payer only claims; an admin decides.
    Route::get('/admin/payments', [PaymentReviewController::class, 'index'])->name('admin.payments.index');
    Route::post('/admin/payments/{reference}/approve', [PaymentReviewController::class, 'approve'])->name('admin.payments.approve');
    Route::post('/admin/payments/{reference}/reject', [PaymentReviewController::class, 'reject'])->name('admin.payments.reject');
});

// Blog
// The public list is named 'blogspot' (restored 2026-09-26 from ec27b03) but
// every redirect after create/update/destroy and both article forms' cancel
// button pointed at 'articles.index', which no route has ever defined. The
// result: every successful article write 500'd on the redirect and both form
// pages threw on render. 101 green tests never caught it because nothing
// asserts on the redirect target after a write.
Route::get('/blogspot', [ArticleController::class, 'index'])->name('blogspot');
Route::get('/limbah', fn () => view('blog.limbah'))->name('limbah');
Route::get('/konservasi', fn () => view('blog.konservasi'))->name('konservasi');
Route::get('/penghijauan', fn () => view('blog.penghijauan'))->name('penghijauan');
Route::get('/hutan', fn () => view('blog.hutan'))->name('hutan');

// Articles CRUD (auth required)
Route::middleware('auth')->group(function () {
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/my-articles', [ArticleController::class, 'myArticles'])->name('articles.my');
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

    // Comments
    Route::middleware('throttle:write')->group(function () {
        Route::post('/articles/{article}/comments', [CommentController::class, 'store'])->name('comments.store');
        Route::post('/comments/{comment}/reply', [CommentController::class, 'reply'])->name('comments.reply');
    });

    // Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.user');

    // Like & Bookmark
    // Throttled together with the other authenticated writes: one account
    // could otherwise toggle thousands of likes in a loop and inflate both
    // the article's counter and the author's notification list.
    Route::middleware('throttle:write')->group(function () {
        Route::post('/articles/{article:slug}/like', [ArticleInteractionController::class, 'toggleLike'])->name('articles.like');
        Route::post('/articles/{article:slug}/bookmark', [ArticleInteractionController::class, 'toggleBookmark'])->name('articles.bookmark');
    });
    Route::get('/bookmarks', [ArticleInteractionController::class, 'indexBookmarks'])->name('bookmarks.index');

    // Follow
    Route::post('/users/{user}/follow', [FollowController::class, 'toggleFollow'])
        ->middleware('throttle:write')
        ->name('users.follow');

    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::middleware('throttle:write')->group(function () {
        Route::post('/notifications/mark-read', [NotificationController::class, 'markAsRead'])->name('notifications.markRead');
        Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllRead');
    });

    // Reports
    // Separate, tighter budget than generic writes: every report notifies
    // an admin, so this is the surface that can actually wake a human up.
    Route::get('/reports/create', [ReportController::class, 'create'])->name('reports.create');
    Route::post('/reports', [ReportController::class, 'store'])
        ->middleware('throttle:report')
        ->name('reports.store');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::patch('/reports/{report}/review', [ReportController::class, 'review'])->name('reports.review');
});

// Public article show (no auth) — slug binding
Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');

// API docs placeholder (dipindah dari routes/web.php lama agar tidak bentrok)
Route::get('/api/docs', fn () => response()->json([
    'title' => 'Greentify API Documentation',
    'endpoints' => [
        '/api/register',
        '/api/login',
        '/api/logout',
        '/api/articles',
        '/api/articles/{id}',
        '/api/categories',
        '/api/categories/{id}',
    ],
]))->name('api.docs');
