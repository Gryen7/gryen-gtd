<?php

namespace App\Providers;

use App\Config;
use App\ConfigMany;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     * @throws \Exception
     */
    public function boot()
    {
        view()->share('CONFIG', Config::getAllConfig());
//        view()->share('CONFIG_MANY', ConfigMany::getAllConfig());
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
