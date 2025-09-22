<?php

namespace App\Livewire;

use Livewire\Component;

class LanguageSwitcher extends Component
{
    public string $language;

    public function mount()
    {
        $this->language = session('language', 'ms');
    }

    public function switchLanguage(string $language)
    {
        session(['language' => $language]);
        app()->setLocale($language);
        $this->language = $language;
        $this->emit('languageChanged', $language);
    }

    public function render()
    {
        return view('livewire.language-switcher');
    }
}
