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
            <li><a href="{{ route('packages.index') }}">Packages</a></li>
            <li class="active">Add Packages</li>
        </ol>
    </div>
</div>

<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>Add New Package</h2>
            </div>
            <div class="body">
                <form class="form-horizontal" id="form_validation" method="POST" action="{{ route('po.store') }}">
                    {{ csrf_field() }}
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Order No</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group {{ $errors->has('supplier_id') ? 'error' : ''}}">
                                <select name="supplier_id" class="form-control show-tick" data-live-search="true">
                                    <option>-- Choose --</option>
                                    <option value="O-0000002">O-0000002</option>
                                </select>
                                @if($errors->has('supplier_id'))
                                    <label class="error" for="supplier_id">{{ $errors->first('supplier_id')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Warehouse</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="warehouse_id" class="form-control" value="{{ old('package_number', 'Menteng Branch') }}" required>
                                </div>
                                @if($errors->has('package_number'))
                                    <label id="package_number-error" class="error" for="package_number">{{ $errors->first('package_number')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Packages Number</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('package_number') ? 'error' : ''}}">
                                    <input type="text" name="package_number" class="form-control" placeholder="Auto Generate" value="{{ old('package_number', 'PKG-0000002') }}" required>
                                </div>
                                @if($errors->has('package_number'))
                                    <label id="package_number-error" class="error" for="package_number">{{ $errors->first('package_number')}}</label>
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

                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <table class="table table-bordered" id="orders" style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="order_detail[1][item]" class="form-control" value="White Bread / box" readonly/>
                                        </td>
                                        <td>
                                            <input type="number" name="order_detail[1][quantity]" class="form-control" value="20" readonly/>
                                        </td>
                                        <td><input type="checkbox" id="md_checkbox_1" class="filled-in chk-col-red"/>
                                            <label for="md_checkbox_1"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="order_detail[1][item]" class="form-control" value="Salad / kg" readonly/>
                                        </td>
                                        <td>
                                            <input type="number" name="order_detail[1][quantity]" class="form-control" value="5" readonly/>
                                        </td>
                                        <td><input type="checkbox" id="md_checkbox_2" class="filled-in chk-col-red"/>
                                            <label for="md_checkbox_2"></label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
                    {{-- <div class="row clearfix">
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
                    </div> --}}

                                       

                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            {{-- <button type="submit" class="btn btn-primary m-t-15 waves-effect"></button> --}}
                            <a href="{{ route('packages.index') }}" class="btn btn-primary m-t-15 waves-effect">Shipping</a>
                            <a href="{{ route('packages.index') }}" class="btn btn-default m-t-15 waves-effect">Back</a>
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