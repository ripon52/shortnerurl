<?php

namespace App\Providers;

use App\Http\Controllers\v1\AccessTokenController;
use App\Services\Concrete\AccessTokenConcreteService;
use App\Services\Concrete\ShortUrlConcrete;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Token Facade Registered
        $this->app->singleton("tokenFacade", function ($app) {

           return new AccessTokenConcreteService();
        });

        // Short-url Facade Registration
        $this->app->singleton("shortUrlFacade", function ($app) {
            return new ShortUrlConcrete();
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
