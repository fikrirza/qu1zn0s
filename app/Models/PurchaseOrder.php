<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $table = 'st_purchase_order';

    protected $fillable = ['supplier_id','warehouse_id','deliver_to','po_number','po_date','expected_delivery_date','po_notes','po_description','po_status'];

    public function poDetails(){
        return $this->hasMany('App\Models\PurchaseOrderDetail');
    }
}
