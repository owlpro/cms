<?php

namespace App\Module;


use Illuminate\Support\Facades\Artisan;

class MakeModule
{
    public static function Run($Name) {

        self::make($Name);
        self::MakePanelController($Name);
        self::MakeCssFiles($Name);
        self::MakeJsFiles($Name);

        echo 'The module was successfully built!';
    }

    private static function Make($Name) {
        $Name = ucfirst($Name);
        Artisan::call('module:make ' . $Name);
    }

    private static function MakePanelController($Name) {
        $Name = ucfirst($Name);
        Artisan::call('module:make-controller ' . $Name . 'PanelController ' . $Name . ' --plain');
    }

    private static function MakeCssFiles($Name) {
        $file = base_path('../Modules/' . ucfirst($Name) . '/Public/css/' . $Name . '.module.panel.css');
        fopen($file, 'w');
    }

    private static function MakeJsFiles($Name) {
        $file = base_path('../Modules/' . ucfirst($Name) . '/Public/js/' . $Name . '.module.panel.js');
        fopen($file, 'w');
    }
}
