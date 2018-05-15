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
Route::get('warehouse', 'WarehouseController@index')->name('warehouse.index')->middleware('can:read-warehouse');
Route::get('warehouse/add', 'WarehouseController@add')->name('warehouse.add')->middleware('can:create-warehouse');
Route::post('warehouse/add', 'WarehouseController@store')->name('warehouse.store')->middleware('can:create-warehouse');
Route::get('warehouse/edit/{slug}', 'WarehouseController@edit')->name('warehouse.edit')->middleware('can:update-warehouse');
Route::post('warehouse/edit', 'WarehouseController@update')->name('warehouse.update')->middleware('can:update-warehouse');
//----- Warehouse Management -----//

//----- Supplier Management -----//
Route::get('supplier', 'SupplierController@index')->name('supplier.index')->middleware('can:read-supplier');
Route::get('supplier/add', 'SupplierController@add')->name('supplier.add')->middleware('can:create-supplier');
Route::post('supplier/add', 'SupplierController@store')->name('supplier.store')->middleware('can:create-supplier');
Route::get('supplier/edit/{slug}', 'SupplierController@edit')->name('supplier.edit')->middleware('can:update-supplier');
Route::post('supplier/edit', 'SupplierController@update')->name('supplier.update')->middleware('can:update-supplier');
//----- Supplier Management -----//

//----- Item Category Management -----//
Route::get('item-category', 'ItemController@index_itemCategory')->name('itemCategory.index')->middleware('can:read-itemCategory');
Route::post('item-category/add', 'ItemController@store_itemCategory')->name('itemCategory.store')->middleware('can:create-itemCategory');
Route::get('item-category/edit/{category_slug}', 'ItemController@edit_itemCategory')->name('itemCategory.edit')->middleware('can:update-itemCategory');
Route::post('item-category/edit', 'ItemController@update_itemCategory')->name('itemCategory.update')->middleware('can:update-itemCategory');
//----- Item Category Management -----//

//----- Item Management -----//
Route::get('items', 'ItemController@index_items')->name('items.index')->middleware('can:read-item');
Route::get('items/add', 'ItemController@add_items')->name('items.add')->middleware('can:create-item');
Route::post('items/add', 'ItemController@store_items')->name('items.store')->middleware('can:create-item');
Route::get('items/edit/{id}', 'ItemController@edit_items')->name('items.edit')->middleware('can:update-item');
Route::post('items/edit', 'ItemController@update_items')->name('items.update')->middleware('can:update-item');
//----- Item Management -----//

//----- Purchase Order Management -----//
Route::get('purchase-order', 'PurchaseOrderController@index')->name('po.index')->middleware('can:read-po');
Route::get('purchase-order/add', 'PurchaseOrderController@add')->name('po.add')->middleware('can:create-po');
Route::post('purchase-order/add', 'PurchaseOrderController@store')->name('po.store')->middleware('can:create-po');
//----- Purchase Order Management -----//


//----- Order Management -----//
Route::get('orders', 'OrdersController@index')->name('orders.index');
Route::get('orders/add', 'OrdersController@add')->name('orders.add');
Route::get('orders/detail/{order_no}', 'OrdersController@detail')->name('orders.detail');
//----- Order Management -----//


//----- Package Management -----//
Route::get('packages', 'PackagesController@index')->name('packages.index');
Route::get('packages/add', 'PackagesController@add')->name('packages.add');
//----- Package Management -----//


//----- Stocks Management -----//
Route::get('stock-summary', 'StocksController@index')->name('stocks.index');
Route::get('stock-summary/available', 'StocksController@available')->name('stocks.available');
Route::get('stock-summary/incoming', 'StocksController@incoming')->name('stocks.incoming');
//----- Stocks Management -----//

//----- Scanin Management -----//
Route::get('scan-in', 'ScaninController@index')->name('scanin.index');
//----- Scanin Management -----//

//----- Scanout Management -----//
Route::get('scan-out', 'ScanoutController@index')->name('scanout.index');
//----- Scanout Management -----//

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