<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = 'st_warehouse';

    protected $fillable = ['name','address','flag_status', 'slug'];

    
    public function user(){

        return $this->hasMany('App\Models\User', 'id');
    }
}
