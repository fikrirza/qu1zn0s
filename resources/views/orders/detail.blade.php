@extends('layouts.master')

@section('title')
<title>Order Details</title>
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
            <li><a href="{{ route('orders.index') }}">Orders</a></li>
            <li class="active">Order Details</li>
        </ol>
    </div>
</div>

<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>Order Details</h2>
            </div>
            <div class="body">
                <form class="form-horizontal" id="form_validation" method="POST" action="{{ route('po.store') }}">
                    {{ csrf_field() }}
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Order No</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('order_no') ? 'error' : ''}}">
                                    <input type="text" name="order_no" class="form-control" placeholder="Auto Generate" value="{{ old('order_no', $getOrder['order_no']) }}" readonly>
                                </div>
                                @if($errors->has('order_no'))
                                    <label id="order_no-error" class="error" for="order_no">{{ $errors->first('order_no')}}</label>
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
                                <div class="form-line {{ $errors->has('order_date') ? 'error' : ''}}">
                                    <input type="text" name="order_date" class="form-control" placeholder="DD/MM/YYYY" value="{{ old('order_date', $getOrder['order_date'] ) }}" readonly>
                                </div>
                                @if($errors->has('order_date'))
                                    <label id="po_date-error" class="error" for="order_date">{{ $errors->first('order_date')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row clearfix">
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
                    </div> --}}
                    <div class="row clearfix m-l-35">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <table class="table table-bordered" id="orders" style="width: 70%;">
                                <tbody>
                                    <tr>
                                        <th></th>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" id="md_checkbox_1" class="filled-in chk-col-red"/>
                                            <label for="md_checkbox_1"></label></td>
                                        <td>
                                            <div class="form-group {{ $errors->has('order_detail[1][item_id]') ? 'error' : '' }}">
                                                <select name="order_detail[1][item_id]" class="form-control" style="width: 100%;">
                                                    <option value="">-- Choose --</option>
                                                    @foreach($getItems as $key)
                                                    <option value="{{ $key->id }}" @if($key->id == '1') selected="" @endif>{{ $key->item_name }} / {{ $key->item_unit }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="{{ $errors->has('quantity') ? 'error' : '' }}">
                                                <input type="number" name="order_detail[1][quantity]" class="form-control col-sm-3" value="20" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" id="md_checkbox_2" class="filled-in chk-col-red"/>
                                            <label for="md_checkbox_2"></label></td>
                                        <td>
                                            <div class="form-group {{ $errors->has('order_detail[1][item_id]') ? 'error' : '' }}">
                                                <select name="order_detail[1][item_id]" class="form-control" style="width: 100%;">
                                                    <option value="">-- Choose --</option>
                                                    @foreach($getItems as $key)
                                                    <option value="{{ $key->id }}" @if($key->id == '4') selected="" @endif>{{ $key->item_name }} / {{ $key->item_unit }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="{{ $errors->has('quantity') ? 'error' : '' }}">
                                                <input type="number" name="order_detail[1][quantity]" class="form-control" value="5" />
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="col-md-6">
                                <label class="btn btn-sm btn-flat bg-green" onclick="addIngredient('orders')">Add Item</label>&nbsp;
                                <label class="btn btn-sm btn-flat bg-red" onclick="delIngredient('orders')">Remove Item</label>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Notes</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('order_notes') ? 'error' : ''}}">
                                    <input type="text" name="order_notes" class="form-control" placeholder="Tell Something" value="{{ old('order_notes') }}" required>
                                </div>
                                @if($errors->has('order_notes'))
                                    <label id="order_notes-error" class="error" for="order_notes">{{ $errors->first('order_notes')}}</label>
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
                                <div class="form-line {{ $errors->has('order_desc') ? 'error' : ''}}">
                                    <textarea  name="order_desc" class="form-control" placeholder="Tell Something" required>{{ old('order_desc') }}</textarea>
                                </div>
                                @if($errors->has('order_desc'))
                                    <label id="order_desc-error" class="error" for="order_desc">{{ $errors->first('order_desc')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Status</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group {{ $errors->has('order_status') ? 'error' : ''}}">
                                <select name="order_status" class="form-control show-tick" data-live-search="true">
                                    <option>-- Choose --</option>
                                    <option value="DRAFT" {{ old('order_status', $getOrder['order_status']) == 'DRAFT' ? 'selected="selected"' : '' }}>DRAFT</option>
                                    <option value="ISSUED" {{ old('order_status', $getOrder['order_status']) == 'ISSUED' ? 'selected="selected"' : '' }}>ISSUED</option>
                                    <option value="PACKAGES" {{ old('order_status', $getOrder['order_status']) == 'PACKAGES' ? 'selected="selected"' : '' }}>PACKAGES</option>
                                    <option value="SHIPPED" {{ old('order_status', $getOrder['order_status']) == 'SHIPPED' ? 'selected="selected"' : '' }}>SHIPPED</option>
                                    <option value="COMPLETED" {{ old('order_status', $getOrder['order_status']) == 'COMPLETED' ? 'selected="selected"' : '' }}>COMPLETED</option>
                                </select>
                                @if($errors->has('order_status'))
                                    <label class="error" for="order_status">{{ $errors->first('order_status')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>

                                       

                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                            <a href="{{ route('orders.index') }}" class="btn btn-default m-t-15 waves-effect">Back</a>
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