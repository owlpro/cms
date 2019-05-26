<?php

namespace App\Module;


use App\Http\Controllers\Controller;
use App\InternalModels\Locale\Locale;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Nwidart\Modules\Facades\Module;

class PanelController extends Controller
{
    public function __construct() {

        $this->assign_languages();

        $this->assign_list();

        View::share('module', Request()->segment(3));

    }

    private function assign_languages() {
        $locales = Locale::where('active', 1)->select(['symbol', 'title'])->get();
        View::share('languages', $locales);

    }

    private function assign_list() {
        $list = [];
        switch (Str::lower(Request()->segment(2))) {
            case "dashboard":
                $list = [];
                break;
            case "module":
                $list = $this->getModuleList();
                break;
            case "system":
                $list = $this->getSystemList();
                break;
            case "setting":
                $list = $this->getSettingList();
                break;
        }

        View::share('list', $list);
    }

    private function getModuleList() {
        return collect(Module::all())->map(function($item) {
            return [
                'url' => $this->generateLink('module', $item->name),
                'title' => Str::lower($item->name),
            ];
        });
    }

    private function getSystemList() {
        return [
            [
                'url' => $this->generateLink('system', 'locale'),
                'title' => 'locale'
            ]
        ];
    }

    private function getSettingList() {
        return [
            [
                'url' => $this->generateLink('setting', 'colors'),
                'title' => 'color'
            ],
        ];
    }

    private function generateLink($part, $segment) {
        return url(env('ADMINISTRATOR_PANEL_URL', '/panel') . "/" . Str::lower($part) . "/" . Str::lower($segment));
    }
}
