<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use DB;

use App\Models\Supplier;


class SupplierController extends Controller
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

        $getSupplier = Supplier::get();

        return view('supplier.index', compact('getSupplier'));
    }

    public function add(){

        return view('supplier.add');
    }

    public function store(Request $request){
        
        
        $message = [
            'supplier_name.required' => 'This Field Required',
            'supplier_name.unique' => 'This Field Already Taken',
            'supplier_address.required' => 'This Field Required',
            'supplier_email.required' => 'This Field Required',
            'supplier_phone.alpha_num' => 'This Field Required',
        ];

        $validator = Validator::make($request->all(), [
            'supplier_name'  => 'required|unique:st_supplier,supplier_name',
            'supplier_address' => 'required',
            'supplier_email' => 'required|email',
            'supplier_phone' => 'required|alpha_num',
        ], $message);


        if($validator->fails()){
            return redirect()->route('supplier.add')->withErrors($validator)->withInput();
        }

        DB::transaction(function() use($request){

            $save = new Supplier;
            $save->supplier_name = $request->supplier_name;
            $save->supplier_address = $request->supplier_address;
            $save->supplier_email = $request->supplier_email;
            $save->supplier_phone = $request->supplier_phone;
            $save->supplier_slug = str_slug($request->supplier_name);
            $save->save();

        });

        return redirect()->route('supplier.index')->with('berhasil', 'New Supplier Successfully Added '.$request->supplier_name);
        
    }

    public function edit($supplier_slug){

        $getSupplier = Supplier::where('supplier_slug', $supplier_slug)->first();

        if($getSupplier == null){
            abort(404);
        }

        return view('supplier.edit', compact('getSupplier'));
    }

    public function update(Request $request){

        $message = [
            'supplier_name.required' => 'This Field Required',
            'supplier_name.unique' => 'This Field Already Taken',
            'supplier_address.required' => 'This Field Required',
            'supplier_email.required' => 'This Field Required',
            'supplier_email.email' => 'Email Not Valid',
            'supplier_phone.required' => 'This Field Required',
            'supplier_phone.alpha_num' => 'Number Only',
        ];

        $validator = Validator::make($request->all(), [
            'supplier_name'  => 'required|unique:st_supplier,supplier_name,'.$request->id,
            'supplier_address' => 'required',
            'supplier_email' => 'required|email',
            'supplier_phone' => 'required|alpha_num',
        ], $message);
        

        if($validator->fails()){
            return redirect()->route('supplier.edit', ['supplier_slug' => $request->supplier_slug])->withErrors($validator)->withInput();
        }

        DB::transaction(function() use($request){
            
            $update = Supplier::find($request->id);
            $update->supplier_name = $request->supplier_name;
            $update->supplier_address = $request->supplier_address;
            $update->supplier_email = $request->supplier_email;
            $update->supplier_phone = $request->supplier_phone;
            $update->supplier_slug = str_slug($request->supplier_name);
            $update->update();

        });

        return redirect()->route('supplier.index')->with('berhasil', 'Supplier Data Successfully Updated '.$request->supplier_name);
    }


}
