<?php

namespace App\Livewire\Shared;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

/**
 * A shared, reusable component for language switching (e.g., Bahasa Melayu/English).
 * Persists the user's choice and refreshes the page for a complete translation.
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

        // Persist the language choice
        Session::put('locale', $language);
        if (Auth::check()) {
            Auth::user()->update(['lang' => $language]);
        }

        $this->currentLanguage = $language;
        $this->dispatch('language-changed', language: $language);

        // Dispatch a notification for user feedback
        $this->dispatch('notifications:success', [
            'message' => 'Bahasa ditukar kepada ' . $this->availableLanguages[$language],
        ]);

        // A redirect is the most reliable way to ensure all parts of the UI are translated
        $this->redirect(request()->header('Referer', '/'), navigate: true);
    }

    public function render()
    {
        return view('livewire.shared.language-switcher');
    }
}
