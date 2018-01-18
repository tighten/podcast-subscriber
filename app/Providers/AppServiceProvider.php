<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use willvincent\Feeds\FeedsFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(FeedsFactory::class, function () {
            return new FeedsFactory(config('feeds'));
        });
    }
}
