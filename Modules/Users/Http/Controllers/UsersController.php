<?php

namespace Modules\Users\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class UsersController extends Controller
{
    public function list(){
        return view('users::administrator.tabs.list');
    }

    public function create(){
        return view('users::administrator.tabs.create');
    }
}
