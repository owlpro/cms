<?php

namespace App\Http\Controllers\System;

use App\InternalModels\Locale\Locale;
use App\InternalModels\Locale\PanelLiterature;
use App\Module\PanelController;
use App\Module\Translator;
use Google\Cloud\Translate\TranslateClient;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class LocaleController extends PanelController
{
    public function makeLocaleDirectory(string $symbol) {
        $symbol = Str::lower($symbol);
        $dirPath = base_path('resources/lang/' . $symbol);
        if (!File::isDirectory($dirPath)) {
            File::makeDirectory($dirPath, 775, true);
            File::chmod($dirPath, 0755);
            $panelContent = file_get_contents(base_path('stubs/lang/panel.stub'));
            $panelContent = str_replace('$SYMBOL$', $symbol, $panelContent);
            File::put($dirPath . '/panel.php', $panelContent);
        }
    }

    public function locales() {
        return view('administrator.InternalModules.Locale.locales', [
            "locales" => Locale::orderBy('id', 'desc')->get(),
        ]);
    }

    public function locale_save(Request $r) {

        foreach ($r->data as $data) {
            if (!($data['symbol'] || $data['title'])) continue;

            $locale = Locale::find($data['id']);

            if ($locale) {
                $locale->symbol = $data['symbol'];
                $locale->title = $data['title'];
                $locale->direction = $data['direction'];
                $locale->active = $data['active'];
                $locale->save();
            } else {
                $locale = Locale::create([
                    'symbol' => $data['symbol'],
                    'title' => $data['title'],
                    'direction' => $data['direction'],
                    'active' => $data['active'],
                ]);
                $this->makeLocaleDirectory($data['symbol']);
                $this->autoLiterature($data['symbol'], $locale->id);
            }
        }

        $this->auto_change_locale();
        return redirect()->back();
    }

    private function autoLiterature($symbol, $locale_id) {
        $locale = Locale::first();
        $texts = $locale->PanelLiterature()->pluck('text', 'title')->toArray();
        foreach ($texts as $title => $text) {
            PanelLiterature::create([
                'locale_id' => $locale_id,
                'title' => $title,
                'text' => Translator::translate($locale->symbol, $symbol, $text)
            ]);
        }
    }

    public function locale_remove($id) {
        $locale = Locale::find($id);
        $path = base_path('resources/lang/' . Str::lower($locale->symbol));
        File::deleteDirectory($path);
        $locale->delete();

        return redirect()->back();

    }


    public function panel_lang() {
        return view('administrator.InternalModules.Locale.panel_lang', [
            'literature' => $this->getPanelLiterature(),
            'locales' => Locale::all(),
        ]);
    }

    private function getPanelLiterature($panel_langs = null) {
        if (is_null($panel_langs))
            $panel_langs = PanelLiterature::orderBy('id', 'desc')->get()->toArray();

        foreach ($panel_langs as $key => $lang) {
            //dd($lang);
            if (!isset($literature[$lang['title']])) {
                $literature[$lang['title']] = [
                    'title' => $lang['title'],
                    'lang' => []
                ];
            }
            $literature[$lang['title']]['lang'][$lang['locale_id']] = [
                'id' => $lang['id'],
                'locale_id' => $lang['locale_id'],
                'text' => $lang['text'],
            ];
        }
        //dd($literature);
        //return [];
        return $literature;
    }

    public function locale_search(Request $r) {
        $search = $r->search;
        $data = null;
        if (!empty($search)) {
            $titles = PanelLiterature::where('title', 'like', "%$search%")
                ->orWhere('text', 'like', "%$search%")
                ->pluck('title')->toArray();
            $data = PanelLiterature::whereIn('title', $titles)->get();
        }
        return view('administrator.InternalModules.Locale.panel_lang', [
            'literature' => $this->getPanelLiterature($data),
            'locales' => Locale::all(),
        ]);
    }

    public function save_panel_lang(Request $r) {

        foreach ($r->data as $data) {
            if (is_null($data['title']) || ($data['lang'][array_key_first($data['lang'])]['id'] == "NULL" && PanelLiterature::where('title', $data['title'])->count())) continue;

            foreach ($data['lang'] as $locale_id => $lang) {
                $literature = PanelLiterature::find($lang['id']);
                if ($literature) {
                    // update literature
                    if (PanelLiterature::where('title', $data['title'])->count() == Locale::count()) {
                        $literature->text = $lang['text'];
                        $literature->save();
                    } else {
                        $literature->title = $data['title'];
                        $literature->text = $lang['text'];
                        $literature->save();
                    }
                } else {
                    // create literature
                    //dd('new');
                    PanelLiterature::create([
                        'locale_id' => $locale_id,
                        'title' => $data['title'],
                        'text' => $lang['text'],
                    ]);
                }
            }
        }
        return redirect()->back();
    }

    public function remove_panel_lang(string $title) {
        PanelLiterature::where('title', $title)->delete();
        return redirect()->back();
    }

    public function site_lang() {
        return view('administrator.InternalModules.Locale.site_lang');
    }

    private function auto_change_locale() {
        if (!(Locale::where('symbol', App::getLocale())->first()->active)) {

            $locale = Locale::where('active', 1);

            if ($locale->count()) {
                $lang = $locale->first()->symbol;
            } else {
                $locate = Locale::where('symbol', 'fa')->first();
                $locate->active = 1;
                $locate->save();
                $lang = 'fa';
            }
            session(['locale' => $lang]);
        }
    }

    public function getLocales() {
        return Locale::all();
    }
}
