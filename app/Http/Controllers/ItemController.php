<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;
use App\Models\ItemCategory;

use Validator;
use DB;


class ItemController extends Controller
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


    //----- Item Category -----//
    public function index_itemCategory(){

        $getItemCategory = ItemCategory::get();
        $addForm = true;

        return view('item-category.index', compact('getItemCategory','addForm'));
    }

    public function store_itemCategory(Request $request){

        $message = [
            'category_name.required' => 'This Field Required',
            'category_name.unique' => 'This Item Category Already Taken',
        ];

        $validator = Validator::make($request->all(), [
            'category_name'  => 'required|unique:st_item_category,category_name',
        ], $message);

        $addForm = true;

        if($validator->fails()){
            return redirect()->route('itemCategory.index', [$addForm])->withErrors($validator)->withInput();
        }

        DB::transaction(function() use($request){
            
            $save = new ItemCategory;
            $save->category_name = $request->category_name;
            $save->category_slug = str_slug($request->category_name);
            $save->save();

        });

        return redirect()->route('itemCategory.index', [$addForm])->with('berhasil', 'New Item Category Successfully Added '.$request->category_name);
    }

    public function edit_itemCategory($category_slug){
        
        $getItemCategory = ItemCategory::get();
        $itemCategory = ItemCategory::where('category_slug', $category_slug)->first();
        $addForm = false;

        return view('item-category.index', compact('getItemCategory','itemCategory','addForm'));

    }

    public function update_itemCategory(Request $request){

        $message = [
            'category_name.required' => 'This Field Required',
            'category_name.unique' => 'This Item Category Already Taken',
        ];

        $validator = Validator::make($request->all(), [
            'category_name'  => 'required|unique:st_item_category,category_name,'.$request->id,
        ], $message);

        $addForm = false;

        if($validator->fails()){
            return redirect()->route('itemCategory.index', [$addForm])->withErrors($validator)->withInput();
        }

        DB::transaction(function() use($request){
            
            $update = ItemCategory::find($request->id);
            $update->category_name = $request->category_name;
            $update->category_slug = str_slug($request->category_name);
            $update->update();

        });

        return redirect()->route('itemCategory.index', [$addForm])->with('berhasil', 'Item Category Successfully Added '.$request->category_name);
    }
    //----- Item Category -----//


    //----- Item -----//
    public function index_items(){

        $getItems = Item::get();

        return view('item.index', compact('getItems'));
    }

    public function add_items(){

        $getItemCategory = ItemCategory::get();

        return view('item.add', compact('getItemCategory'));

    }

    public function store_items(Request $request){

        $message = [
            'item_category.required' => 'This Field Required',
            'item_name.required' => 'This Field Required',
            'item_sku.required' => 'This Field Required',
            'item_unit.required' => 'This Field Required',
            'item_description.required' => 'This Field Required',
            'item_min_stock.required' => 'This Field Required',
        ];

        $validator = Validator::make($request->all(), [
            'item_category'  => 'required',
            'item_name'  => 'required',
            'item_sku'  => 'required',
            'item_unit'  => 'required',
            'item_description'  => 'required',
            'item_min_stock'  => 'required',
        ], $message);

        if($validator->fails()){
            return redirect()->route('items.index')->withErrors($validator)->withInput();
        }


        DB::transaction(function() use($request){
            
            $save = new Item;
            $save->item_category = $request->item_category;
            $save->item_name = $request->item_name;
            $save->item_sku = $request->item_sku;
            $save->item_unit = $request->item_unit;
            $save->item_description = $request->item_description;
            $save->item_min_stock = $request->item_min_stock;
            $save->save();

        });

        return redirect()->route('items.index')->with('berhasil', 'New Item Successfully Added '.$request->item_name);
    }

    public function edit_items($id){

        $getItem = Item::find($id);
        $getItemCategory = ItemCategory::get();

        if($getItem == null){
            abort(404);
        }

        return view('item.edit', compact('getItemCategory','getItem'));

    }

    public function update_items(Request $request){

        $message = [
            'item_category.required' => 'This Field Required',
            'item_name.required' => 'This Field Required',
            'item_sku.required' => 'This Field Required',
            'item_unit.required' => 'This Field Required',
            'item_description.required' => 'This Field Required',
            'item_min_stock.required' => 'This Field Required',
        ];

        $validator = Validator::make($request->all(), [
            'item_category'  => 'required',
            'item_name'  => 'required',
            'item_sku'  => 'required',
            'item_unit'  => 'required',
            'item_description'  => 'required',
            'item_min_stock'  => 'required',
        ], $message);


        if($validator->fails()){
            return redirect()->route('items.edit', ['id' => $request->id])->withErrors($validator)->withInput();
        }

        DB::transaction(function() use($request){
            
            $update = Item::find($request->id);
            $update->item_category = $request->item_category;
            $update->item_name = $request->item_name;
            $update->item_sku = $request->item_sku;
            $update->item_unit = $request->item_unit;
            $update->item_description = $request->item_description;
            $update->item_min_stock = $request->item_min_stock;
            $update->update();

        });

        return redirect()->route('items.index')->with('berhasil', 'Item Successfully Updated '.$request->item_name);
    
    }


}
