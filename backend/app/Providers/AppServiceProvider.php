<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // // Ensure Sanctum routes are registered
        // $this->app->singleton('router', function ($app) {
        //     return Route::getRoutes();
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Prevents Laravel from wrapping JSON responses in a "data" key
        JsonResource::withoutWrapping();
    }
}
