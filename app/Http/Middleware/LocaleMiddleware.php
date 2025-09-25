<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

/**
 * Sets the application locale based on the user's session.
 */
class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * This middleware checks the session for a 'locale' key. If a valid locale
     * is found, it sets it as the application's current language. Otherwise,
     * it falls back to the default locale specified in the config.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $defaultLocale = config('app.locale', 'ms');
        $supportedLocales = config('app.supported_locales', ['en', 'ms']);
        $sessionLocale = null;

        // Only attempt to get session locale if the session is available
        if (method_exists($request, 'hasSession') && $request->hasSession()) {
            $sessionLocale = $request->session()->get('locale');
        }

        // Use the session locale only if it's in the supported list.
        if ($sessionLocale && in_array($sessionLocale, $supportedLocales)) {
            App::setLocale($sessionLocale);
        } else {
            // Otherwise, fall back to the default locale.
            App::setLocale($defaultLocale);
        }

        return $next($request);
    }
}
