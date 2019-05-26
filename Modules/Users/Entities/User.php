<?php

namespace Modules\Users\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\users
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $type
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Spatie\Permission\Models\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Entities\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Entities\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Entities\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Entities\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Entities\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Entities\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Entities\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Entities\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Entities\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Entities\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Entities\User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Entities\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
