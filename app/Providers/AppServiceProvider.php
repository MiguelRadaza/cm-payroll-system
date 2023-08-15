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
        Blade::component('small-box-widget', \App\View\Components\smallBoxWidget::class);
        Blade::component('alert-widget', \App\View\Components\alertWidget::class);
        Blade::component('modal', \App\View\Components\modal::class);
    }
}
