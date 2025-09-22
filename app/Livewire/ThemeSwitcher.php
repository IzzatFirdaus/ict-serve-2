<?php

namespace App\Livewire;

use Livewire\Component;

class ThemeSwitcher extends Component
{
    public string $theme;

    public function mount()
    {
        $this->theme = session('theme', 'system');
    }

    public function switchTheme(string $theme)
    {
        session(['theme' => $theme]);
        $this->theme = $theme;
        $this->emit('themeChanged', $theme);
    }

    public function render()
    {
        return view('livewire.theme-switcher');
    }
}
