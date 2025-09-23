<?php

namespace App\Filament\Components;

use Livewire\Component;

class LanguageSwitcher extends Component
{
    public string $language = 'en';

    public function switchLanguage(string $lang): void
    {
        $this->language = $lang;
        session(['locale' => $lang]);
        app()->setLocale($lang);
        $this->emit('languageChanged', $lang);
    }

    public function render()
    {
        return view('filament.components.language-switcher');
    }
}
