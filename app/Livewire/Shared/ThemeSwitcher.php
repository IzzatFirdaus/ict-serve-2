<?php

namespace App\Livewire\Shared;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ThemeSwitcher extends Component
{
    public string $theme = 'system';

    public function mount(): void
    {
        $this->theme = $this->resolveTheme();
    }

    public function switchTheme(string $theme): void
    {
        if (! in_array($theme, ['light', 'dark', 'system'])) {
            return;
        }

        $this->theme = $theme;

        // Persist for guest in session/localStorage via JS event
        Session::put('theme', $theme);

        // Persist for authenticated users
        if (Auth::check()) {
            $user = Auth::user();
            $user->forceFill(['theme' => $theme])->save();
        }

        // Emit event for frontend JS to update <html data-theme>
        $this->dispatchBrowserEvent('theme-changed', ['theme' => $theme]);

        // Notify user
        $this->dispatchBrowserEvent('notify', ['type' => 'success', 'message' => __('messages.toast.theme_switched')]);
    }

    public function render()
    {
        return view('livewire.shared.theme-switcher');
    }

    private function resolveTheme(): string
    {
        // Auth user preference
        if (Auth::check() && Auth::user()->theme) {
            return Auth::user()->theme;
        }

        // Session or default
        return Session::get('theme', 'system');
    }
}
