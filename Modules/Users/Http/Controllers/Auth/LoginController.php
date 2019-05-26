<?php

//namespace App\Http\Controllers\Auth;
namespace Modules\Users\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\URL;
use Modules\Users\Entities\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm() {
        return view('users::auth.login');
    }

    public function redirectPath() {
        // TODO  change seeAdminPanel Policy
        if (auth()->user()->can('seeAdminPanel', User::class)) {
            return env('ADMINISTRATOR_PANEL_URL', 'panel') . '/dashboard';
        }
        return '/home';
    }
}
