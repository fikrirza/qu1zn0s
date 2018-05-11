<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use DB;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderDetail;

use App\Models\Supplier;
use App\Models\Warehouse;
use App\Models\Item;

class PurchaseOrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $getPurchase = PurchaseOrder::get();

        return view('purchase-order.index', compact('getPurchase'));
    }

    public function add(){

        $getSupplier = Supplier::get();
        $getWarehouse = Warehouse::get();
        $getItems = Item::get();
        
        return view('purchase-order.add', compact('getSupplier', 'getWarehouse', 'getItems'));
    }

    


}
