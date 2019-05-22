<?php

namespace Modules\Locale\Http\Controllers;

use App\Module\PanelController;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Modules\Locale\Entities\Locale;
use Modules\Locale\Entities\PanelLiterature;

class LocalePanelController extends PanelController
{
    private $PanelLiteraturePrePage = 5;

    public function addLocaleFile(string $symbol) {
        $symbol = Str::lower($symbol);
        //$dirPath = base_path('resources/lang/' . $symbol);
        $dirPath = base_path('resources/lang/' . $symbol);
        if (!File::isDirectory($dirPath)) {
            $result = File::makeDirectory($dirPath);
            $result = File::chmod($dirPath, 0775);
            dd($result);
        }
    }

    public function locales() {
        return view('locale::administrator.locales', [
            "locales" => Locale::orderBy('id', 'desc')->get(),
        ]);
    }

    public function locale_save(Request $r) {
        $this->addLocaleFile('ar');

        foreach ($r->data as $data) {
            if (!($data['symbol'] || $data['title'])) continue;

            Locale::updateOrCreate(['id' => $data['id']], [
                'symbol' => $data['symbol'],
                'title' => $data['title'],
                'direction' => $data['direction'],
                'active' => $data['active'],
            ]);

        }
        $this->auto_change_locale();
        return redirect()->back();
    }

    public function locale_remove($id) {
        Locale::find($id)->delete();
        return redirect()->back();

    }


    public function panel_lang() {
        $data = $this->getPanelLiterature();
        return view('locale::administrator.panel_lang', [
            'literature' => new LengthAwarePaginator(
                $data['data'],
                $data['total'],
                $data['per_page'],
                $data['current_page'],
                ['path' => url(env('ADMINISTRATOR_PANEL_URL') . '/locale/panel_lang')]
            ),
            'locales' => Locale::all(),
        ]);
    }

    private function getPanelLiterature() {
        $panel_langs = PanelLiterature::orderBy('id', 'desc')->paginate($this->PanelLiteraturePrePage * Locale::count())->toArray();
        foreach ($panel_langs['data'] as $key => $lang) {
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
        $panel_langs['data'] = $literature;
        return $panel_langs;
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
        return view('locale::administrator.site_lang');
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
