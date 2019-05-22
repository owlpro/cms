<?php

use Modules\Locale\Entities\Locale;
use Modules\Locale\Entities\PanelLiterature;


if (!function_exists('module_asset')) {
    function module_asset($module, $path) {
        if ($path[0] == "/") $path = substr($path, 1);
        return url('/Modules/' . ucfirst($module) . '/Public/' . $path);
    }
}

if (!function_exists('direction')) {

    function direction() {
        return Locale::where('symbol', app()->getLocale())->select('direction')->first()->direction;
    }
}

if (!function_exists('array_key_first')) {
    function array_key_first(array $arr) {
        foreach ($arr as $key => $unused) {
            return $key;
        }
        return NULL;
    }
}

if (!function_exists('panel_lang')) {
    function panel_lang($literature) {
        if (substr($literature, 0,6) == 'panel.') {
            $lang = substr($literature, 6);
            if (PanelLiterature::where('title', $lang)->count()) return __($literature);
        }
        return $literature;
    }
}

