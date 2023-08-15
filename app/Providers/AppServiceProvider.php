<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::component('smallBoxWidget', \App\View\Components\SmallBoxWidget::class);
        Blade::component('alert', \App\View\Components\SmallBoxWidget::class);
        Blade::component('alertWidget', \App\View\Components\SmallBoxWidget::class);
    }
}
