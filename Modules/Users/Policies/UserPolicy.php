<?php

namespace Modules\Users\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Users\Entities\User;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    public function before(){
        return $this->seeAdminPanel();
    }

    public function seeAdminPanel() {
        return in_array(auth()->user()->type, User::ACCESS_TO_ADMIN_PANEL);
    }
}
