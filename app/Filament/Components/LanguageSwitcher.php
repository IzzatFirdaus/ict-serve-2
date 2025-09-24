<?php

namespace App\Filament\Components;

use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageSwitcher extends Component
{
    /**
     * The currently active language locale.
     * e.g., 'en', 'ms'.
     *
     * @var string
     */
    public string $language = 'ms';

    /**
     * Mount the component and initialize the language from the session or app default.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->language = Session::get('locale', App::getLocale());
    }

    /**
     * Switch the application language and persist the choice in the session.
     *
     * This method updates the session with the new locale and then triggers a
     * page refresh to ensure all content is re-rendered in the selected language.
     *
     * @param string $lang The new language locale to switch to (e.g., 'en', 'ms').
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switchLanguage(string $lang): RedirectResponse
    {
        // Validate against a list of supported languages for security and integrity.
        $supportedLocales = config('app.supported_locales', ['en', 'ms']);

        if (in_array($lang, $supportedLocales)) {
            Session::put('locale', $lang);
        }

        // A full redirect is the most reliable way to apply a language change.
        return redirect(request()->header('Referer', '/'));
    }

    /**
     * Render the language switcher component view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render(): View
    {
        return view('filament.components.language-switcher');
    }
}
