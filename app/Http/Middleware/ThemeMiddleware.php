<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

/**
 * Sets the application's visual theme for the current request.
 */
class ThemeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * This middleware determines the correct theme by checking, in order:
     * 1. The authenticated user's saved preference.
     * 2. The value stored in the user's session.
     * 3. A system-wide default ('system').
     *
     * The final, validated theme is then shared with all views.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $supportedThemes = ['light', 'dark', 'system'];
        $defaultTheme = 'system';
        $theme = $defaultTheme;

        // Prioritize the authenticated user's saved preference.
        $user = $request->user();
        if ($user && !empty($user->theme)) {
            $theme = $user->theme;
        }
        // Fallback to the session theme if no user preference is set.
        elseif ($request->session()->has('theme')) {
            $theme = $request->session()->get('theme');
        }

        // Validate the determined theme. If it's not supported, use the default.
        if (!in_array($theme, $supportedThemes)) {
            $theme = $defaultTheme;
        }

        // Share the final theme value with all views.
        View::share('currentTheme', $theme);

        return $next($request);
    }
}
