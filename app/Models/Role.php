<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'st_roles';

    protected $casts = [
        'permissions' => 'array',
    ];

    protected $fillable = [
        'name', 'slug', 'permissions'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'st_role_users');
    }

    public function hasAccess(array $permissions) : bool
    {
        foreach($permissions as $permission){
            if($this->hasPermission($permission))
                return true;
        }

        return false;
    }

    private function hasPermission(string $permission) : bool
    {
        return $this->permissions[$permission] ?? false;
    }
}
