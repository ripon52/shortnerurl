<?php

namespace App\Providers;

use App\Http\Controllers\v1\AccessTokenController;
use App\Services\Concrete\AccessTokenConcreteService;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
