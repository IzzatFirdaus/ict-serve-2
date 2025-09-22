<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switch(Request $request)
    {
        $lang = $request->input('lang');
        if (in_array($lang, ['en', 'ms'])) {
            session(['locale' => $lang]);
            app()->setLocale($lang);
        }
        return redirect()->back();
    }
}
