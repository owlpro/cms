<?php

namespace App\Http\Middleware;

use App\InternalModels\Locale\Locale;
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
            if ($this->hasLocale(session('locale'))) {
                $locale = Str::lower(session('locale'));
            } else {
                $locale = 'fa';
            }
            App::setLocale($locale);
        }
        return $next($request);
    }

    private function hasLocale($symbol) {
        return Locale::where('symbol', Str::lower($symbol))->count();
    }
}
