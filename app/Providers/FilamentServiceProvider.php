<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use App\Filament\Components\LanguageSwitcher;
use App\Filament\Components\ThemeSwitcher;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Filament::serving(function () {
            // Register custom components, widgets, and translations here
            Filament::registerTheme(mix('css/filament.css'));

            Filament::registerRenderHook(
                'global-search.end',
                fn () => view('filament.components.language-switcher')
            );

            Filament::registerRenderHook(
                'global-search.end',
                fn () => view('filament.components.theme-switcher')
            );
        });
    }
}
