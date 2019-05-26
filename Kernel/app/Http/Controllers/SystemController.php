<?php

namespace App\Http\Controllers;

use App\Module\PanelController;

class SystemController extends PanelController
{
    public function index(){
        return view('administrator.system');
    }
}
