<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the locale from the session or use the default locale from the app config
        $locale = Session::get('locale', config('app.locale'));

        // Set the application locale
        app()->setLocale($locale);

        // Update the locale in the session
        session(['locale' => app()->getLocale()]);

        // Continue processing the request
        return $next($request);
    }
}
