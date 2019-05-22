<?php

namespace Modules\Users\Http\Controllers;


use App\Module\PanelController;

class UsersPanelController extends PanelController
{
    public function list(){
        return view('users::administrator.list');
    }

    public function create(){
        return view('users::administrator.create');
    }
}
