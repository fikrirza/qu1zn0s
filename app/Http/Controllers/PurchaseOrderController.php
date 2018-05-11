<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use DB;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderDetail;

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

        
        return view('purchase-order.add');
    }


}
