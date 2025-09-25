<?php

namespace App\Livewire\Shared;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

/**
 * A shared, reusable component for theme switching (light/dark/system).
 * Persists the user's choice in the database and session, providing a consistent UX.
 *
 * @method void dispatchBrowserEvent(string $event, mixed $data = null)
 */
class ThemeSwitcher extends Component
{
    public string $currentTheme;

    public array $availableThemes = [
        'light' => 'Cerah',
        'dark' => 'Gelap',
        'system' => 'Sistem',
    ];

    public function mount(): void
    {
        $this->currentTheme = $this->resolveUserTheme();
    }

    public function switchTheme(string $theme): void
    {
        if (! array_key_exists($theme, $this->availableThemes)) {
            return;
        }

        // Persist the theme choice
        Session::put('theme', $theme);
        if (Auth::check()) {
            Auth::user()->update(['theme' => $theme]);
        }

        $this->currentTheme = $theme;
        $this->dispatch('theme-changed', theme: $theme);

        // Dispatch a notification for user feedback
        $this->dispatch('notifications:success', [
            'message' => 'Tema ditukar kepada '.$this->availableThemes[$theme],
        ]);

        // Immediately update the browser's theme attribute for instant visual change
        $this->js("
            document.documentElement.setAttribute('data-theme', '$theme');
            localStorage.setItem('theme', '$theme');
        ");
    }

    private function resolveUserTheme(): string
    {
        if (Auth::check() && Auth::user()->theme) {
            return Auth::user()->theme;
        }

        return Session::get('theme', 'system');
    }

    public function render()
    {
        /** @phpstan-return \Illuminate\View\View */
        return view('livewire.shared.theme-switcher');
    }
}
