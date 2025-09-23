<?php

namespace App\Livewire\Shared;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class LanguageSwitcher extends Component
{
    public string $lang = 'ms';

    public array $available = [
        'ms' => 'Bahasa Melayu',
        'en' => 'English',
    ];

    public function mount(): void
    {
        $this->lang = $this->resolveLanguage();
    }

    public function switchLanguage(string $lang): void
    {
        if (! array_key_exists($lang, $this->available)) {
            return;
        }

        $this->lang = $lang;

        // Persist in session
        Session::put('locale', $lang);
        App::setLocale($lang);

        // Persist for authenticated users
        if (Auth::check()) {
            Auth::user()->forceFill(['lang' => $lang])->save();
        }

        // Emit browser event to notify frontend components
        $this->dispatchBrowserEvent('language-changed', ['lang' => $lang]);

        // Notify user
        $this->dispatchBrowserEvent('notify', ['type' => 'success', 'message' => __('messages.toast.language_switched')]);
    }

    public function render()
    {
        return view('livewire.shared.language-switcher');
    }

    private function resolveLanguage(): string
    {
        if (Auth::check() && Auth::user()->lang) {
            return Auth::user()->lang;
        }

        return Session::get('locale', config('app.locale', 'ms'));
    }
}
