<?php

namespace App\Providers;

use App\View\Components\Alert;
use App\View\Components\Inputs\Button;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        // Blade::if('env', function ($value) {
        //     if (config('app.env') == $value)
        //         return true;
        //     return false;
        // });

        //Blade::component('alert',Alert::class);

    }
}
