<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LanguageController extends Controller
{
    public function switch(Request $request)
    {
        $allowedLocales = config('app.allowed_locales', ['en', 'ms']);
        $language = $request->input('lang'); // Updated to match test cases

        if (!in_array($language, $allowedLocales, true)) {
            return redirect()->back()->with('status', __('messages.language_switch_invalid'));
        }

        session(['locale' => $language]);
        app()->setLocale($language);

        Log::info('Language switched', [
            'user_id' => $request->user()?->id,
            'ip' => $request->ip(),
            'locale' => $language,
        ]);

        return redirect()->back()->with('status', __('messages.toast.language_switched'));
    }
}
