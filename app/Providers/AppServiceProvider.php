<?php

namespace App\Providers;

use App\Clients\PaddleClient;
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
        $this->app->bind('paddle', function () {
            return new PaddleClient;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('license-api', function (Request $request) {
            return Limit::perMinute(30)->by($request->ip());
        });
    }
}
