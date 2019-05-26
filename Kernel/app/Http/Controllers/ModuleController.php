<?php

namespace App\Http\Controllers;

use App\Module\PanelController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Nwidart\Modules\Facades\Module;

class ModuleController extends PanelController
{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        return view('administrator.module');
    }
}
