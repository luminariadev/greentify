<?php

namespace App\Providers;

use App\Payments\Gateways\ManualGateway;
use App\Payments\PaymentGateway;
use App\Payments\PaymentManager;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Swapping in a real provider (Midtrans, Xendit, QRIS acquirer) is
        // this one binding — no controller or model changes required.
        $this->app->singleton(PaymentGateway::class, ManualGateway::class);

        $this->app->singleton(PaymentManager::class, fn ($app): PaymentManager => new PaymentManager(
            $app->make(PaymentGateway::class),
        ));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureRateLimiters();
    }

    /**
     * Named rate limiters, one per trust boundary.
     *
     * Before this, the only throttle in the app was a literal
     * `throttle:10,1` on the payment confirm route. Every other write
     * endpoint — login, register, comment, report, contact, newsletter
     * subscribe — was unthrottled, so a single client could open thousands
     * of accounts, flood the admin inbox with reports, or use the contact
     * form as a mail relay. The literal form also cannot be raised or
     * lowered without editing route files.
     *
     * Named limiters are declared once here, so changing a limit is a
     * one-line change in a file that is obviously about limits.
     *
     * The login limit is keyed by email+IP rather than IP alone: an IP-only
     * limit locks out a whole office/NAT/campus after a few people mistype
     * their password, while a per-account limit is what actually stops
     * credential stuffing.
     */
    private function configureRateLimiters(): void
    {
        RateLimiter::for('login', function (Request $request): Limit {
            $email = mb_strtolower(trim((string) $request->input('email')));

            return Limit::perMinutes(5, $email === '' ? 20 : 5)
                ->by('login:'.$request->ip().'|'.$email);
        });

        // Registration is keyed by IP: the point is to stop one client
        // making many accounts, and the email varies by definition.
        RateLimiter::for('register', fn (Request $request): Limit => Limit::perMinutes(60, 5)
            ->by('register:'.$request->ip()));

        // Password reset / any other credential-guessing surface shares the
        // login budget so a single client cannot split attempts across two
        // routes to double the tries per account.
        RateLimiter::for('password-reset', fn (Request $request): Limit => Limit::perMinutes(15, 5)
            ->by('password-reset:'.$request->ip()));

        // Authenticated writes (comments, replies, likes, bookmarks,
        // follows, notifications). Generous for a human, tight enough that
        // one account cannot flood another user's notification list.
        RateLimiter::for('write', fn (Request $request): Limit => Limit::perMinutes(1, 30)
            ->by('write:'.($request->user()?->id ?? $request->ip())));

        // Public unauthenticated submissions: contact form and newsletter
        // subscribe. Low because there is no identity to rate on and both
        // write to a shared inbox / mailing list.
        RateLimiter::for('public-submit', fn (Request $request): Limit => Limit::perMinutes(10, 3)
            ->by('public-submit:'.$request->ip()));

        // Content reports. Each report notifies an admin, so this is the
        // one unauthenticated-ish surface that can wake a human up.
        RateLimiter::for('report', fn (Request $request): Limit => Limit::perHours(1, 10)
            ->by('report:'.($request->user()?->id ?? $request->ip())));

        // Password-reset link sends and any other outbound-mail trigger.
        RateLimiter::for('email', fn (Request $request): Limit => Limit::perMinutes(1, 2)
            ->by('email:'.$request->ip()));

        // The payment confirm route already had throttle:10,1 as a literal.
        // Named now so the manual gateway's settlement path has one limit
        // definition with the rest, and can be retuned without touching
        // the route file.
        RateLimiter::for('payment', fn (Request $request): Limit => Limit::perMinutes(1, 10)
            ->by('payment:'.($request->user()?->id ?? $request->ip())));
    }
}
