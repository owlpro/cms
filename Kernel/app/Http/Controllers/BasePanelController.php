<?php

namespace App\Http\Controllers;



use App\InternalModels\Locale\Locale;

class BasePanelController extends Controller
{

    public function changeLocale($locale) {
        $locales = Locale::pluck('symbol')->toArray();

        if (in_array($locale, $locales)) {
            session(['locale' => $locale]);
            return redirect()->back();
        } else {
            return Response('Locale Not Found!', 404);
        }

    }
}
