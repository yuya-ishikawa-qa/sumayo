<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);
        \Blade::if('owner', function () {
            return (auth()->check() && auth()->user()->is_owner);
        });

        /**
         * .envファイルの(APP_ENV=production)のとき、強制https化
         */
        if(\App::environment('production')) {
            \URL::forceScheme('https');
        }
    }
}
