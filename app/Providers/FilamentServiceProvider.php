<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\HtmlString;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            // NOTE: Custom Filament styles should be placed in your main app.scss
            // file. The main stylesheet is loaded by the layout, so registering
            // a separate theme here is not necessary.

            // Register render hooks to add the Livewire components to the topbar.
            Filament::registerRenderHook(
                'panels::global-search.after',
                fn (): string => new HtmlString('<livewire:shared.language-switcher />')
            );

            Filament::registerRenderHook(
                'panels::global-search.after',
                fn (): string => new HtmlString('<livewire:shared.theme-switcher />')
            );
        });
    }
}
