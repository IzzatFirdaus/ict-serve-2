<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('ICTServe (iServe)')
            ->favicon(asset('favicon.ico'))
            ->colors($this->getMydsColors())
            ->font('Inter')
            ->darkMode()
            ->globalSearchKeyBindings(['command+k', 'ctrl+k'])
            ->sidebarCollapsibleOnDesktop()
            ->navigationGroups([
                __('filament.navigation.users'),
                __('filament.navigation.equipment'),
                __('filament.navigation.loans'),
                __('filament.navigation.helpdesk'),
                __('filament.navigation.admin'),
                __('filament.navigation.reports'),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->spa()
            ->maxContentWidth('full')
            ->authGuard('web')
            ->passwordReset()
            ->emailVerification()
            ->profile()
            ->globalSearch()
            ->renderHook(
                'panels::body.start',
                fn (): string => '<script>
                    document.documentElement.setAttribute("data-theme", localStorage.getItem("theme") || "system");
                </script>'
            );
    }

    /**
     * Get MYDS-compliant color palette
     */
    private function getMydsColors(): array
    {
        return [
            'primary' => Color::hex('#2680e9'),
            'gray' => Color::Slate,
            'danger' => Color::Red,
            'info' => Color::Blue,
            'success' => Color::Green,
            'warning' => Color::Amber,
        ];
    }
}
