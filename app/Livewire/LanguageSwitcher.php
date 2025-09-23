<?php

namespace App\Livewire;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

/**
 * Language Switcher Component for Filament Admin Panel
 *
 * Provides bilingual (BM/EN) language switching with persistent preferences.
 * Integrates with MYDS design system and accessibility standards.
 */
class LanguageSwitcher extends Component
{
    public string $currentLanguage;

    public array $availableLanguages = [
        'ms' => 'Bahasa Melayu',
        'en' => 'English',
    ];

    public function mount(): void
    {
        $this->currentLanguage = App::getLocale();
    }

    public function switchLanguage(string $language): void
    {
        if (! array_key_exists($language, $this->availableLanguages)) {
            return;
        }

        // Set application locale
        App::setLocale($language);
        Session::put('locale', $language);

        // Save to user profile if authenticated
        if (Auth::check()) {
            Auth::user()->update(['lang' => $language]);
        }

        $this->currentLanguage = $language;

        // Emit event for other components to refresh
        $this->dispatch('language-changed', language: $language);

        // Show success notification
        $this->dispatch('filament:notify', [
            'status' => 'success',
            'message' => __('filament.language.switched_to', ['language' => $this->availableLanguages[$language]]),
        ]);

        // Refresh the page to update all UI elements
        $this->redirect(request()->url(), navigate: true);
    }

    public function render()
    {
        return view('livewire.language-switcher');
    }
}
