<?php

namespace App\Providers;

use App\Payments\Gateways\ManualGateway;
use App\Payments\PaymentGateway;
use App\Payments\PaymentManager;
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
        //
    }
}
