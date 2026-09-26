<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleInteractionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\MarketplaceController;
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
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public pages
Route::get('/', fn () => view('landing'))->name('welcome');

Route::get('/contact', [ContactFormController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactFormController::class, 'store'])->name('contact.store');

// Marketplace (Green Affiliate)
Route::get('/marketplace', [MarketplaceController::class, 'index'])->name('marketplace.index');
Route::get('/marketplace/{product}', [MarketplaceController::class, 'show'])->name('marketplace.show');

// Membership
Route::middleware('auth')->group(function () {
    Route::get('/membership', [MembershipController::class, 'status'])->name('membership.status');
    Route::get('/membership/pricing', [MembershipController::class, 'pricing'])->name('membership.pricing');
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
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/newsletter/unsubscribe', [NewsletterController::class, 'showUnsubscribeForm'])->name('newsletter.unsubscribe.page');
Route::post('/newsletter/unsubscribe', [NewsletterController::class, 'unsubscribe'])->name('newsletter.unsubscribe');

// Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/newsletter/send', [NewsletterController::class, 'send'])->name('admin.newsletter.send');
});

// Blog
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
    Route::post('/articles/{article}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/comments/{comment}/reply', [CommentController::class, 'reply'])->name('comments.reply');

    // Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.user');

    // Like & Bookmark
    Route::post('/articles/{article:slug}/like', [ArticleInteractionController::class, 'toggleLike'])->name('articles.like');
    Route::post('/articles/{article:slug}/bookmark', [ArticleInteractionController::class, 'toggleBookmark'])->name('articles.bookmark');
    Route::get('/bookmarks', [ArticleInteractionController::class, 'indexBookmarks'])->name('bookmarks.index');

    // Follow
    Route::post('/users/{user}/follow', [FollowController::class, 'toggleFollow'])->name('users.follow');

    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/mark-read', [NotificationController::class, 'markAsRead'])->name('notifications.markRead');
    Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllRead');

    // Reports
    Route::get('/reports/create', [ReportController::class, 'create'])->name('reports.create');
    Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
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
