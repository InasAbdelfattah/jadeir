<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Silber\Bouncer\Database\HasRolesAndAbilities;


class User extends Authenticatable
{
    use Notifiable , HasRolesAndAbilities;

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

    public function hasAnyRoles()
    {
        if (auth()->check()) {
            return auth()->user()->roles->count();
        } else {
            redirect(route('admin.login'));
        }
    }

    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function devices()
    {
        return $this->hasMany(Device::class);
    }

    public function rates()
    {
        return $this->hasMany('App\Models\Rate');

    }

    public function city()
    {
        return $this->belongsTo(City::class ,'city_id');
    }

}
