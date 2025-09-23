<?php

namespace App\Filament\Components;

use Livewire\Component;

class ThemeSwitcher extends Component
{
    public string $theme = 'system';

    public function switchTheme(string $theme): void
    {
        $this->theme = $theme;
        session(['theme' => $theme]);
        $this->emit('themeChanged', $theme);
    }

    public function render()
    {
        return view('filament.components.theme-switcher');
    }
}
