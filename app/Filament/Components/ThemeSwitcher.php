<?php

namespace App\Filament\Components;

use Livewire\Component;
use Illuminate\Contracts\View\View;

class ThemeSwitcher extends Component
{
    /**
     * The currently active theme.
     * Can be 'light', 'dark', or 'system'.
     *
     * @var string
     */
    public string $theme = 'system';

    /**
     * Mount the component and initialize the theme from the session.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->theme = session('theme', 'system');
    }

    /**
     * Switch the application theme and persist the choice in the session.
     *
     * This method updates the component's theme state, stores the new theme
     * in the user's session, and dispatches an event to notify other parts of
     * the application about the theme change.
     *
     * @param string $theme The new theme to switch to ('light', 'dark', 'system').
     * @return void
     */
    public function switchTheme(string $theme): void
    {
        // Validate the theme input to prevent arbitrary session values.
        if (!in_array($theme, ['light', 'dark', 'system'])) {
            return;
        }

        $this->theme = $theme;
        session(['theme' => $theme]);

        // Dispatch an event to notify other components of the theme change.
        $this->dispatch('themeChanged', $theme);
    }

    /**
     * Render the theme switcher component view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render(): View
    {
        return view('filament.components.theme-switcher');
    }
}
