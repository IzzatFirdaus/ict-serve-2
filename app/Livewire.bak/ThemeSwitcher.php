<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

/**
 * Theme Switcher Component for Filament Admin Panel
 * 
 * Provides light/dark/system theme switching with persistent preferences.
 * Integrates with MYDS design system and accessibility standards.
 */
class ThemeSwitcher extends Component
{
    public string $currentTheme;
    public array $availableThemes = [
        'light' => 'Light',
        'dark' => 'Dark', 
        'system' => 'System',
    ];

    public function mount(): void
    {
        $this->currentTheme = $this->getUserTheme();
    }

    public function switchTheme(string $theme): void
    {
        if (!array_key_exists($theme, $this->availableThemes)) {
            return;
        }

        // Save to session
        Session::put('theme', $theme);

        // Save to user profile if authenticated
        if (Auth::check()) {
            Auth::user()->update(['theme' => $theme]);
        }

        $this->currentTheme = $theme;

        // Emit event for theme change
        $this->dispatch('theme-changed', theme: $theme);
        
        // Show success notification
        $this->dispatch('filament:notify', [
            'status' => 'success',
            'message' => __('filament.theme.switched_to', ['theme' => $this->availableThemes[$theme]]),
        ]);

        // Update the HTML data-theme attribute via JavaScript
        $this->js("
            document.documentElement.setAttribute('data-theme', '$theme');
            localStorage.setItem('theme', '$theme');
            window.dispatchEvent(new CustomEvent('theme-changed', { detail: { theme: '$theme' } }));
        ");
    }

    private function getUserTheme(): string
    {
        // Check user profile first if authenticated
        if (Auth::check() && Auth::user()->theme) {
            return Auth::user()->theme;
        }

        // Fallback to session
        return Session::get('theme', 'system');
    }

    public function render()
    {
        return view('livewire.theme-switcher');
    }
}
