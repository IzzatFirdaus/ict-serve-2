<?php

namespace App\Providers;

use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        // Set locale from session if available
        if (session()->has('locale')) {
            app()->setLocale(session('locale'));
        }

        // Temporarily disabled to debug memory issues
        // view()->composer('*', function ($view) {
        //     $view->with('currentTheme', ThemeController::getCurrentTheme());
        // });

        // Blade::component('layouts.guest', 'guest-layout');
    }
}
