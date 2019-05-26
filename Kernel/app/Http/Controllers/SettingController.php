<?php

namespace App\Http\Controllers;

use App\Module\PanelController;

class SettingController extends PanelController
{
    public function index(){
        return view('administrator.setting');
    }
}
