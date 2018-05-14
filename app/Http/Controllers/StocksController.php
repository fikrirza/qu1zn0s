<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;

class StocksController extends Controller
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

        $getItems = Item::get();

        return view('stocks.index', compact('getItems'));
    }
}
