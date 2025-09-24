<?php

namespace App\Filament\Components;

use Livewire\Component;

/**
 * @method void emit(string $event, mixed ...$params)
 * @method void dispatchBrowserEvent(string $event, mixed $data = null)
 */
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
        /** @phpstan-return \Illuminate\View\View */
        return view('filament.components.language-switcher');
    }
}
