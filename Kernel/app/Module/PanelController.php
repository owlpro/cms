<?php

namespace App\Module;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Modules\Locale\Entities\Locale;
use Modules\Users\Entities\User;
use Nwidart\Modules\Facades\Module;

class PanelController extends Controller
{
    public function __construct() {

        $this->defineModulesVariable();

        $this->defineModuleTabsVariables();

        $this->defineChangeLocaleVariables();
    }

    private function defineModulesVariable() {
        View::share('modules', array_keys(Module::all()));
    }

    private function defineModuleTabsVariables() {
        $module = Request::segment(2);
        View::share('current_module', $module);
        View::share('name', $module);
    }

    private function defineChangeLocaleVariables() {
        $locales = Locale::where('active', 1)->select(['symbol', 'title'])->get();
        View::share('languages', $locales);

    }
}
