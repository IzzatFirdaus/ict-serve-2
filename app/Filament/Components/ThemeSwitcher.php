<?php

namespace App\Filament\Components;

use Livewire\Component;

/**
 * @method void emit(string $event, mixed ...$params)
 * @method void dispatchBrowserEvent(string $event, mixed $data = null)
 */
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
        /** @phpstan-return \Illuminate\View\View */
        return view('filament.components.theme-switcher');
    }
}
