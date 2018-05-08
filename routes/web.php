<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'Auth\LoginController@showLoginForm');

Route::get('/home', 'HomeController@index')->name('home');


//----- Warehouse Management -----//
Route::get('warehouse', 'WarehouseController@index')->name('warehouse.index');
Route::get('warehouse/add', 'WarehouseController@add')->name('warehouse.add');
Route::post('warehouse/add', 'WarehouseController@store')->name('warehouse.store');
Route::get('warehouse/edit/{slug}', 'WarehouseController@edit')->name('warehouse.edit');
Route::post('warehouse/edit', 'WarehouseController@update')->name('warehouse.update');
//----- Warehouse Management -----//

//----- Supplier Management -----//
Route::get('supplier', 'SupplierController@index')->name('supplier.index');
Route::get('supplier/add', 'SupplierController@add')->name('supplier.add');
Route::post('supplier/add', 'SupplierController@store')->name('supplier.store');
Route::get('supplier/edit/{slug}', 'SupplierController@edit')->name('supplier.edit');
Route::post('supplier/edit', 'SupplierController@update')->name('supplier.update');
//----- Supplier Management -----//


//----- Account Management -----//
Route::get('account', 'AccountController@index')->name('user.index')->middleware('can:read-user');
Route::get('account/add', 'AccountController@tambah')->name('user.add')->middleware('can:create-user');
Route::post('account/add', 'AccountController@store')->name('user.store')->middleware('can:create-user');
Route::get('account/edit/{id}', 'AccountController@ubah')->name('user.ubah')->middleware('can:update-user');
Route::post('account/edit', 'AccountController@update')->name('user.update')->middleware('can:update-user');

Route::get('account/role', 'AccountController@role')->name('role.index')->middleware('can:read-role');
Route::get('account/role/create', 'AccountController@roleCreate')->name('role.add')->middleware('can:create-role');
Route::post('account/role/create', 'AccountController@rolePost')->name('role.store')->middleware('can:create-role');
Route::get('account/role/{slug}', 'AccountController@roleUbah')->name('role.ubah')->middleware('can:update-role');
Route::post('account/role/update', 'AccountController@roleEdit')->name('role.update')->middleware('can:update-role');
Route::get('account/reset/{id}', 'AccountController@reset')->middleware('can:reset-user');
Route::get('account/activate/{id}', 'AccountController@activate')->middleware('can:activate-user');

Route::get('account/profile', 'AccountController@profile')->name('account.profile');
Route::post('account/profile', 'AccountController@postProfile')->name('account.postProfile');
Route::post('account/profile/password', 'AccountController@changePassword')->name('account.password');
//----- Account Management -----//