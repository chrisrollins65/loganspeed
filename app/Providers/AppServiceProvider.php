<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('appLanguages', config('app.languages'));
        // Set the locale based on the first segment of the request
        if (in_array(request()->segment(1), config('app.languages'))) {
            app()->setLocale(request()->segment(1));
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
