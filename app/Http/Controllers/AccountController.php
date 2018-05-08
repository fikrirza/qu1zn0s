<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;

use DB;
use Auth;
use Validator;
use Hash;
use Image;
use Mail;

class AccountController extends Controller
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

        $getUser = User::with('roles')->get();

        return view('account.index', compact('getUser'));
    }

    public function tambah()
    {
        $getRole = Role::get();

        return view('account.add', compact('getRole'));
    }




    //---------- Controller For Role Users ----------//
    public function role()
    {
        $getRole = Role::get();

        return view('account.role', compact('getRole'));
    }
    
    public function roleCreate()
    {
        return view('account.role-add');
    }
    
    public function rolePost(Request $request)
    {
        $message = [
            'name.required' => 'This field is required',
            'name.unique' => 'Role has already taken',
            'permissions.required' => 'This field is required',
        ];
        $validator = Validator::make($request->all(),[
                'name' => 'required|unique:st_roles',
                'permissions' => 'required',
            ],$message);

        if($validator->fails())
        {
            return redirect()->route('role.add')->withErrors($validator)->withInput();
        }

        $new = new Role;
        $new->name = $request->name;
        $new->slug = str_slug($request->name);
        $new->permissions = $request->input('permissions');
        $new->save();
        
        return redirect()->route('role.index')->with('berhasil', 'Data Role has been successfully create');
    }
    
    public function roleUbah($slug)
    {
        $getRole = Role::where('slug', $slug)->first();
        
        if(!$getRole){
            return view('errors.404');
        }

        $can = array();
        
        foreach ($getRole->permissions as $key => $value) {
            $can[] = $key;
        }
        
        return view('account.role-edit', compact('getRole', 'can'));
    }

    public function roleEdit(Request $request)
    {
        $message = [
            'permissions.required' => 'This field is required',
        ];
        
        $validator = Validator::make($request->all(),[
            'permissions' => 'required',
            ],$message);
        
        if($validator->fails())
        {
            return redirect()->route('role.ubah', ['slug' => $request->slug])->withErrors($validator)->withInput()->with('gagal', 'Please at least give one access');
        }


        $update = Role::find($request->id);
        $update->permissions = $request->input('permissions');
        $update->update();
        
        
        return redirect()->route('role.index')->with('berhasil', 'Data Role has been successfully updated');
    }
    
}
