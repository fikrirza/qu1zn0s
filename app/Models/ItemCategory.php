<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    protected $table = 'st_item_category';

    protected $fillable = ['category_name'];

    public function items(){
    
        return $this->hasMany('App\Models\Item');
    }
}
