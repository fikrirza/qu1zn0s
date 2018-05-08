@extends('layouts.master')

@section('title')
<title>Warehouse</title>
@endsection

@section('content')
<div class="row clear-fix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-right">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li><a href="{{ route('warehouse.index') }}">Warehouse</a></li>
            <li class="active">Edit Warehouse</li>
        </ol>
    </div>
</div>

<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>Edit Warehouse</h2>
            </div>
            <div class="body">
                <form class="form-horizontal" id="form_validation" method="POST" action="{{ route('warehouse.update') }}">
                    {{ csrf_field() }}
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Name</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('warehouse_name') ? 'error' : ''}}">
                                    <input type="hidden" name="id" value="{{ $getWarehouse->id }}">
                                    <input type="text" name="warehouse_name" class="form-control" placeholder="e.g: First Warehouse" value="{{ old('name', $getWarehouse->name) }}" required>
                                </div>
                                @if($errors->has('warehouse_name'))
                                    <label id="name-error" class="error" for="name">{{ $errors->first('warehouse_name')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Address</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('address') ? 'error' : ''}}">
                                    <textarea name="address" class="form-control" placeholder="e.g: Jl. Jalan Yuk Kita" required>{{ old('address', $getWarehouse->address )}}</textarea>
                                </div>
                                @if($errors->has('address'))
                                    <label id="address-error" class="error" for="address">{{ $errors->first('address')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                                       

                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                            <a href="{{ route('warehouse.index') }}" class="btn btn-default m-t-15 waves-effect">Back</a>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('bottomscript')
<script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>

<script>
    $(document).ready(function () {
        $('#form_validation').validate({
            rules: {
                'name': {
                    required: true
                },
                'address': {
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