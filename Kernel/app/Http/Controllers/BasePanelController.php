<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use League\Flysystem\Adapter\Local;
use Modules\Locale\Entities\Locale;
use Modules\Users\Entities\User;
use Nwidart\Modules\Facades\Module;

class BasePanelController extends Controller
{

    public function index() {
        $this->authorize('seeAdminPanel', User::class);
        $modules = $this->getModules();
        return view('admin_panel_templates.default.dashboard', compact('modules'));

    }

    private function getModules() {
        return array_keys(Module::all());
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
