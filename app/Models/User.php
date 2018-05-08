<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'st_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'avatar', 'email', 'warehouse_id', 'password', 'login_count', 'api_token', 'confirmed'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'st_role_users');
    }

    public function hasAccess(array $permissions) : bool
    {
        //check if the permission is available in any role
        foreach($this->roles as $role){
            if($role->hasAccess($permissions)){
                return true;
            }
        }
        
        return false;
    }

    public function inRole(string $roleSlug)
    {
        return $this->roles()->where('slug', $roleSlug)->count() == 1;
    }

    public function warehouse(){
        return $this->belongsTo('App\Models\Warehouse', 'warehouse_id');
    }
}
