@extends('layouts.master')

@section('title')
<title>Add Purchase Order</title>
@endsection

@section('headscript')
<link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
<link href="{{ asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="row clear-fix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-right">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li><a href="{{ route('po.index') }}">Purchase Orders</a></li>
            <li class="active">Add Purchase Order</li>
        </ol>
    </div>
</div>

<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>Add New Purchase Order</h2>
            </div>
            <div class="body">
                <form class="form-horizontal" id="form_validation" method="POST" action="{{ route('po.store') }}">
                    {{ csrf_field() }}
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Supplier</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group {{ $errors->has('supplier_id') ? 'error' : ''}}">
                                <select name="supplier_id" class="form-control show-tick" data-live-search="true">
                                    <option>-- Choose --</option>
                                    @foreach($getSupplier as $key)
                                    <option value="{{ $key->id }}" {{ old('supplier_id') == $key->id ? 'selected="selected"' : '' }}>{{ $key->supplier_name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('supplier_id'))
                                    <label class="error" for="supplier_id">{{ $errors->first('supplier_id')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Deliver To</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group {{ $errors->has('warehouse_id') ? 'error' : ''}}">
                                <select name="warehouse_id" class="form-control show-tick" data-live-search="true">
                                    <option>-- Choose --</option>
                                    @foreach($getWarehouse as $key)
                                    <option value="{{ $key->id }}" {{ old('warehouse_id') == $key->id ? 'selected="selected"' : '' }}>{{ $key->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('warehouse_id'))
                                    <label class="error" for="warehouse_id">{{ $errors->first('warehouse_id')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Purchase Order</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('po_number') ? 'error' : ''}}">
                                    <input type="text" name="po_number" class="form-control" placeholder="Auto Generate" value="{{ old('po_number') }}" required>
                                </div>
                                @if($errors->has('po_number'))
                                    <label id="po_number-error" class="error" for="po_number">{{ $errors->first('po_number')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Date</label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('po_date') ? 'error' : ''}}">
                                    <input type="text" name="po_date" class="datepicker form-control" placeholder="DD/MM/YYYY" value="{{ old('po_date') }}" required>
                                </div>
                                @if($errors->has('po_date'))
                                    <label id="po_date-error" class="error" for="po_date">{{ $errors->first('po_date')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Expected Delivery</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('expected_delivery_date') ? 'error' : ''}}">
                                    <input type="text" name="expected_delivery_date" class="datepicker_1 form-control" placeholder="DD/MM/YYYY" value="{{ old('expected_delivery_date') }}" required>
                                </div>
                                @if($errors->has('expected_delivery_date'))
                                    <label id="expected_delivery_date-error" class="error" for="expected_delivery_date">{{ $errors->first('expected_delivery_date')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row clearfix">
                        <div class="table-responsive">
                            <table class="table" id="dItems">
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>Item</td>
                                        <td>Quantity</td>
                                        <td>Price</td>
                                        <td>Amount</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="md_checkbox_21" class="filled-in chk-col-red"/>
                                            <label for="md_checkbox_21"></label>
                                        </td>
                                        <td>
                                            <div class="form-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                <select name="purchase_order_detail[1][item_id]" class="form-control">
                                                    <option>-- Choose --</option>
                                                    @foreach($getItems as $key)
                                                    <option value="{{ $key->id }}" {{ old('item_id') == $key->id ? 'selected="selected"' : '' }}>{{ $key->item_name }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('purchase_order_detail[1][item_id]'))
                                                    <label class="error" for="item_id">{{ $errors->first('purchase_order_detail[1][item_id]')}}</label>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                <div class="form-line {{ $errors->has('purchase_order_detail[1][quantity]') ? 'error' : ''}}">
                                                    <input type="number" name="purchase_order_detail[1][quantity]" class="form-control" value="{{ old('purchase_order_detail[1][quantity]') }}" placeholder="QTY" required>
                                                </div>
                                                @if($errors->has('purchase_order_detail[1][quantity]'))
                                                    <label id="quantity-error" class="error" for="quantity">{{ $errors->first('purchase_order_detail[1][quantity]')}}</label>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                <div class="form-line {{ $errors->has('purchase_order_detail[1][price]') ? 'error' : ''}}">
                                                    <input type="number" name="purchase_order_detail[1][price]" class="form-control" value="{{ old('purchase_order_detail[1][price]') }}" placeholder="Price" required>
                                                </div>
                                                @if($errors->has('purchase_order_detail[1][price]'))
                                                    <label id="price-error" class="error" for="price">{{ $errors->first('purchase_order_detail[1][price]')}}</label>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                <div class="form-line {{ $errors->has('purchase_order_detail[1][amount]') ? 'error' : ''}}">
                                                    <input type="number" name="purchase_order_detail[1][amount]" class="form-control" value="{{ old('purchase_order_detail[1][amount]') }}" placeholder="Amount" required>
                                                </div>
                                                @if($errors->has('purchase_order_detail[1][amount]'))
                                                    <label id="amount-error" class="error" for="amount">{{ $errors->first('purchase_order_detail[1][amount]')}}</label>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="col-md-6">
                                <label class="btn btn-sm btn-flat bg-green" onclick="addItem('dItems');">Add Item</label>&nbsp;
                                <label class="btn btn-sm btn-flat bg-red" onclick="delItem('dItems');">Remove Item</label>
                            </div>


                        </div>
                    </div> --}}
                    <div class="row clearfix">
                        <table class="table" id="orders">
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Amount</th>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" id="md_checkbox_21" class="filled-in chk-col-red"/>
                                        <label for="md_checkbox_21"></label></td>
                                    <td>
                                        <div class="form-group {{ $errors->has('order_detail[1][item_id]') ? 'error' : '' }}">
                                            <select name="order_detail[1][item_id]" class="form-control select2" style="width: 100%;">
                                                <option value="">-- Choose --</option>
                                                @foreach($getItems as $key)
                                                <option value="{{ $key->id }}">{{ $key->item_name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('order_detail[1][item_id]'))
                                            <span class="help-block">
                                                <i>* {{$errors->first('order_detail[1][item_id]')}}</i>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="{{ $errors->has('quantity') ? 'error' : '' }}">
                                            <input type="number" name="order_detail[1][quantity]" class="form-control" value="" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="{{ $errors->has('price') ? 'error' : '' }}">
                                            <input type="number" name="order_detail[1][price]" class="form-control" value="" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="{{ $errors->has('amount') ? 'error' : '' }}">
                                            <input type="number" name="order_detail[1][amount]" class="form-control" value="" />
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="col-md-6">
                            <label class="btn btn-sm btn-flat bg-green" onclick="addIngredient('orders')">Add Ingredient</label>&nbsp;
                            <label class="btn btn-sm btn-flat bg-red" onclick="delIngredient('orders')">Remove Ingredient</label>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Notes</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('po_notes') ? 'error' : ''}}">
                                    <input type="text" name="po_notes" class="form-control" placeholder="Tell Something" value="{{ old('po_notes') }}" required>
                                </div>
                                @if($errors->has('po_notes'))
                                    <label id="po_notes-error" class="error" for="po_notes">{{ $errors->first('po_notes')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Description</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('po_notes') ? 'error' : ''}}">
                                    <textarea  name="po_notes" class="form-control" placeholder="Tell Something" required>{{ old('po_notes') }}</textarea>
                                </div>
                                @if($errors->has('po_notes'))
                                    <label id="po_notes-error" class="error" for="po_notes">{{ $errors->first('po_notes')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Status</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group {{ $errors->has('po_status') ? 'error' : ''}}">
                                <select name="po_status" class="form-control show-tick" data-live-search="true">
                                    <option>-- Choose --</option>
                                    <option value="DRAFT" {{ old('po_status') == 'DRAFT' ? 'selected="selected"' : '' }}>DRAFT</option>
                                    <option value="ISSUED" {{ old('po_status') == 'ISSUED' ? 'selected="selected"' : '' }}>ISSUED</option>
                                </select>
                                @if($errors->has('po_status'))
                                    <label class="error" for="po_status">{{ $errors->first('po_status')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>

                                       

                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                            <a href="{{ route('po.index') }}" class="btn btn-default m-t-15 waves-effect">Back</a>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('bottomscript')
<script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
<script src="{{ asset('plugins/momentjs/moment.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>

<script language="javascript">
    
    var numA=1;
    function addIngredient(tableID) {
        numA++;
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);
        var cell1 = row.insertCell(0);
        cell1.innerHTML = '<input type="checkbox" id="md_checkbox_['+numA+']" name="chk[]" class="filled-in chk-col-red"/><label for="md_checkbox_['+numA+']"></label>';
        var cell2 = row.insertCell(1);
        cell2.innerHTML = '<select name="order_detail['+numA+'][item_id]" class="form-control select2"><option value="">-- Choose --</option>@foreach($getItems as $key)<option value="{{ $key->id }}">{{ $key->item_name }}</option>@endforeach</select>@if($errors->has("order_detail['+numA+'][item_id]"))<span class="help-block"><i>* {{$errors->first("order_detail['+numA+'][item_id]")}}</i></span>@endif';
        var cell3 = row.insertCell(2);
        cell3.innerHTML = '<input type="number" name="order_detail['+numA+'][quantity]" class="form-control" value="" />';
        var cell4 = row.insertCell(3);
        cell4.innerHTML = '<input type="number" name="order_detail['+numA+'][price]" class="form-control" value="" />';
        var cell5 = row.insertCell(4);
        cell5.innerHTML = '<input type="number" name="order_detail['+numA+'][amount]" class="form-control" value="" />';
        $(".select2").select2();
    }

    function delIngredient(tableID) {
        try {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        for(var i=0; i<rowCount; i++) {
            var row = table.rows[i];
            var chkbox = row.cells[0].childNodes[0];
            if(null != chkbox && true == chkbox.checked) {
                table.deleteRow(i);
                rowCount--;
                i--;
                numA--;
            }
        }
        }catch(e) {
            alert(e);
        }
    }
    </script>

<script>
    $(document).ready(function () {
        $('#form_validation').validate({
            rules: {
                'supplier_id': {
                    required: true
                },
                'warehouse_id': {
                    required: true
                },
                'po_number': {
                    required: true
                },
                'po_date': {
                    required: true
                },
                'expected_delivery_date': {
                    required: true
                },
                'po_status': {
                    required: true
                },
            },
    
            highlight: function (input) {
                $(input).parents('.form-line').addClass('error');
            },
            unhighlight: function (input) {
                $(input).parents('.form-line').removeClass('error');
            },
            errorPlacement: function (error, element) {
                $(element).parents('.form-group').append(error);
            }
        });
        
        $('.datepicker').bootstrapMaterialDatePicker({
            format: 'DD/MM/YYYY',
            clearButton: true,
            weekStart: 1,
            time: false
        });

        $('.datepicker_1').bootstrapMaterialDatePicker({
            format: 'DD/MM/YYYY',
            clearButton: true,
            weekStart: 1,
            time: false
        });
    });
</script>
@endsection