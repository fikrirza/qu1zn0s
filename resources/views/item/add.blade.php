@extends('layouts.master')

@section('title')
<title>Items</title>
@endsection

@section('headscript')
<link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="row clear-fix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-right">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li><a href="{{ route('items.index') }}">Items</a></li>
            <li class="active">Add Item</li>
        </ol>
    </div>
</div>

<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>Add New Item</h2>
            </div>
            <div class="body">
                <form class="form-horizontal" id="form_validation" method="POST" action="{{ route('items.store') }}">
                    {{ csrf_field() }}
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Category</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <select name="item_category" class="form-control show-tick" data-live-search="true">
                                    <option>-- Choose --</option>
                                    @foreach($getItemCategory as $key)
                                    <option value="{{ $key->id }}" {{ old('item_category') == $key->id ? 'selected="selected"' : '' }}>{{ $key->category_name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('warehouse_name'))
                                    <label id="name-error" class="error" for="name">{{ $errors->first('warehouse_name')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Name</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('item_name') ? 'error' : ''}}">
                                    <input type="text" name="item_name" class="form-control" placeholder="e.g: Things" value="{{ old('item_name') }}" required>
                                </div>
                                @if($errors->has('item_name'))
                                    <label id="address-error" class="error" for="address">{{ $errors->first('item_name')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">SKU</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('item_sku') ? 'error' : ''}}">
                                    <input type="text" name="item_sku" class="form-control" placeholder="e.g: SKU" value="{{ old('item_sku') }}" required>
                                </div>
                                @if($errors->has('item_sku'))
                                    <label id="address-error" class="error" for="address">{{ $errors->first('item_sku')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Unit</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <select name="item_unit" class="form-control show-tick">
                                    <option>-- Choose --</option>
                                    <option value="gr" {{ old('item_unit') == 'gr' ? 'selected="selected"' : '' }}>gr</option>
                                    <option value="kg" {{ old('item_unit') == 'kg' ? 'selected="selected"' : '' }}>kg</option>
                                    <option value="pcs" {{ old('item_unit') == 'pcs' ? 'selected="selected"' : '' }}>pcs</option>
                                    <option value="slice" {{ old('item_unit') == 'slice' ? 'selected="selected"' : '' }}>slice</option>
                                    <option value="box" {{ old('item_unit') == 'box' ? 'selected="selected"' : '' }}>box</option>
                                </select>
                                @if($errors->has('warehouse_name'))
                                    <label id="name-error" class="error" for="name">{{ $errors->first('warehouse_name')}}</label>
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
                                <div class="form-line {{ $errors->has('item_description') ? 'error' : ''}}">
                                    <textarea name="item_description" class="form-control" placeholder="e.g: Tell something about the item" required>{{ old('item_description')}}</textarea>
                                </div>
                                @if($errors->has('item_description'))
                                    <label id="item_description-error" class="error" for="item_description">{{ $errors->first('item_description')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Min Stock</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('item_min_stock') ? 'error' : ''}}">
                                    <input type="number" name="item_min_stock" class="form-control" placeholder="e.g: 10" value="{{ old('item_min_stock') }}" required>
                                </div>
                                @if($errors->has('item_min_stock'))
                                    <label id="address-error" class="error" for="address">{{ $errors->first('item_min_stock')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                                       

                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                            <a href="{{ route('items.index') }}" class="btn btn-default m-t-15 waves-effect">Back</a>
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
<script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>

<script>
    $(document).ready(function () {
        $('#form_validation').validate({
            rules: {
                'item_category': {
                    required: true
                },
                'item_description': {
                    required: true
                },
                'item_name': {
                    required: true
                },
                'item_unit': {
                    required: true
                },
                'item_min_stock': {
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
    });
</script>
@endsection