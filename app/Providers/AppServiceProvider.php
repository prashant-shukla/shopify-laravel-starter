<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Shopify\Auth\FileSessionStorage;
use Shopify\Context;
use Shopify\Shopify;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Context::initialize(
            env('SHOPIFY_API_KEY'),
            env('SHOPIFY_API_SECRET'),
            env('SHOPIFY_API_SCOPES'),
            config('app.url'),
            new FileSessionStorage(storage_path('framework/cache/shopify_sessions'))
        );
    }
}
