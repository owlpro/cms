<?php

namespace App\Http\Controllers;

use App\Module\PanelController;

class DashboardController extends PanelController
{
    public function index(){
        return view('administrator.dashboard');
    }
}
