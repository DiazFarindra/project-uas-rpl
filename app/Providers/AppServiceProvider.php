<?php

namespace App\Providers;

use App\Models\Information;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        // force https scheme
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
