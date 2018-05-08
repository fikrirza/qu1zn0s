<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use DB;

use App\Models\Warehouse;

class WarehouseController extends Controller
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

        $getWarehouse = Warehouse::get();

        return view('warehouse.index', compact('getWarehouse'));
    }

    public function add(){


        return view('warehouse.add');
    }

    public function store(Request $request){

        $message = [
            'warehouse_name.required' => 'This Field Required',
            'warehouse_name.unique' => 'This Field Already Taken',
            'address.required' => 'This Field Required',
        ];

        $validator = Validator::make($request->all(), [
            'warehouse_name'  => 'required|unique:st_warehouse,name',
            'address' => 'required',
        ], $message);

        if($validator->fails()){
            return redirect()->route('warehouse.add')->withErrors($validator)->withInput();
        }

        DB::transaction(function() use($request){
            
            $save = new Warehouse;
            $save->name = $request->warehouse_name;
            $save->address = $request->address;
            $save->slug = str_slug($request->warehouse_name);
            $save->save();

        });

        return redirect()->route('warehouse.index')->with('berhasil', 'New Warehouse Successfully Added '.$request->warehouse_name);

    }

    public function edit($slug){

        $getWarehouse = Warehouse::where('slug', $slug)->first();

        if($getWarehouse == null ){
            abort(404);
        }

        return view('warehouse.edit', compact('getWarehouse'));
    }

    public function update(Request $request){

        $message = [
            'warehouse_name.required' => 'This Field Required',
            'warehouse_name.unique' => 'This Field Already Taken',
            'address.required' => 'This Field Required',
        ];

        $validator = Validator::make($request->all(), [
            'warehouse_name'  => 'required|unique:st_warehouse,name,'.$request->id,
            'address' => 'required',
        ], $message);

        if($validator->fails()){
            return redirect()->route('warehouse.edit', ['slug' => $request->slug])->withErrors($validator)->withInput();
        }

        DB::transaction(function() use($request){
            
            $update = Warehouse::find($request->id);
            $update->name = $request->warehouse_name;
            $update->address = $request->address;
            $update->slug = str_slug($request->warehouse_name);
            $update->update();

        });

        return redirect()->route('warehouse.index')->with('berhasil', 'Warehouse Data Successfully Updated '.$request->warehouse_name);

    }

    



}
