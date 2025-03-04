<?php

namespace App\Providers;

use App\Services\AddressService;
use App\Services\PaymentService;
use App\Services\SubscriptionService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;
use App\Services\RegistrationService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(RegistrationService::class, function ($app) {
            return new RegistrationService(
                $app->make(UserService::class),
                $app->make(AddressService::class),
                $app->make(PaymentService::class),
                $app->make(SubscriptionService::class)
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
