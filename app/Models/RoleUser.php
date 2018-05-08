<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class RoleUser extends Model
{
    protected $table = 'st_role_users';

    protected $fillable = ['user_id', 'role_id'];
}
