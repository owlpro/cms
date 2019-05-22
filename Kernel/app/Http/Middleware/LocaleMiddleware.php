<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (!session()->has('locale')) {
            session('locale', 'fa');
            App::setLocale('fa');
        } else {
            App::setLocale(Str::lower(session('locale')));
        }
        return $next($request);
    }
}
