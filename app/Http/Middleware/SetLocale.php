<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Request  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if locale is set in session
        if (Session::has('locale')) {
            $locale = Session::get('locale');
            if (in_array($locale, ['en', 'bn'])) {
                App::setLocale($locale);
            }
        }
        
        // Check if locale is set in cookie
        if ($request->hasCookie('locale')) {
            $locale = $request->cookie('locale');
            if (in_array($locale, ['en', 'bn'])) {
                App::setLocale($locale);
                Session::put('locale', $locale);
            }
        }
        
        // Default to English if no locale is set
        if (!Session::has('locale')) {
            Session::put('locale', 'en');
            App::setLocale('en');
        }

        return $next($request);
    }
}
