<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class AppLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check header request and determine localizaton
        if ($request->hasHeader('locale')) {
            $locale = $request->header('locale');
        } elseif (env('DEFAULT_LANGUAGE') != null) {
            $locale = env('DEFAULT_LANGUAGE');
        } else {
            $locale = 'ar';
        }
        // set laravel localization
        App::setLocale($locale);
        // continue request
        return $next($request);
    }
}