<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'st_supplier';

    protected $fillable = ['supplier_code','supplier_name','supplier_email','supplier_phone','supplier_address','supplier_slug'];

    
}
