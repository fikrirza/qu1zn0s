<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;

class OrdersController extends Controller
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

        return view('orders.index');
    }

    public function add(){

        $getItems = Item::get();

        return view('orders.add', compact('getItems'));
    }

    public function detail($order_no){

        $getItems = Item::get();

        if($order_no == 'O-0000004'){
            $getOrder['order_no'] = 'O-0000004';
            $getOrder['order_date'] = '16/05/2018';
            $getOrder['order_status'] = 'DRAFT';

        }elseif($order_no == 'O-0000003'){
            $getOrder['order_no'] = 'O-0000003';
            $getOrder['order_date'] = '14/05/2018';
            $getOrder['order_status'] = 'SHIPPED';

        }elseif($order_no == 'O-0000002'){
            $getOrder['order_no'] = 'O-0000002';
            $getOrder['order_date'] = '04/05/2018';
            $getOrder['order_status'] = 'ISSUED';

        }else{
            $getOrder['order_no'] = 'O-0000001';
            $getOrder['order_date'] = '01/05/2018';
            $getOrder['order_status'] = 'COMPLETED';


        }

        return view('orders.detail', compact('getItems', 'getOrder'));
    }


}
