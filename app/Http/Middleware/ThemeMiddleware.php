<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ThemeMiddleware
{
    public function handle($request, Closure $next)
    {
        $theme = session('theme', 'system');
        if (Auth::check() && Auth::user()->theme) {
            $theme = Auth::user()->theme;
        }
        // Share theme with all views
        view()->share('currentTheme', $theme);

        return $next($request);
    }
}
