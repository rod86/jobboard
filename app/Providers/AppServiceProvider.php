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
        view()->composer('includes.header', 'App\Http\Composers\NavigationComposer@composeMainMenu');

	    view()->composer('layouts.dashboard', 'App\Http\Composers\NavigationComposer@composeCompanyMenu');
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
