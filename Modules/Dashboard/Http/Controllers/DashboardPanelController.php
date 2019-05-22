<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Module\PanelController;

class DashboardPanelController extends PanelController
{
    public function create(){
        return view('dashboard::administrator.create');
    }

    public function list(){
        return view('dashboard::administrator.list');
    }
}
