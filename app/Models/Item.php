<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'st_item';

    protected $fillable = ['item_category','item_name','item_sku','item_unit','item_unit_price','item_description','item_min_stock'];


    public function itemCategory(){
        
        return $this->belongsTo('App\Models\ItemCategory', 'item_category');
    }


}
