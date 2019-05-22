<?php

namespace App\Http\Controllers;

use App\Module\PanelController;
use Modules\Locale\Entities\Locale;
use Modules\Users\Entities\User;

class BasePanelController extends PanelController
{

    public function index() {

        $this->authorize('seeAdminPanel', User::class);

        return redirect(env('ADMINISTRATOR_PANEL_URL').'/dashboard');

    }


    public function changeLocale($locale) {
        $locales = Locale::pluck('symbol')->toArray();

        if(in_array($locale, $locales)){
            session(['locale' => $locale]);
            return redirect()->back();
        } else {
            return Response('Locale Not Found!',404);
        }

    }
}
