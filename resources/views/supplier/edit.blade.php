@extends('layouts.master')

@section('title')
<title>Supplier</title>
@endsection

@section('content')
<div class="row clear-fix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-right">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li><a href="{{ route('supplier.index') }}">Supplier</a></li>
            <li class="active">Edit Supplier</li>
        </ol>
    </div>
</div>

<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>Edit Supplier</h2>
            </div>
            <div class="body">
                <form class="form-horizontal" id="form_validation" method="POST" action="{{ route('supplier.update') }}">
                    {{ csrf_field() }}
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Name</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('supplier_name') ? 'error' : ''}}">
                                    <input type="hidden" name="id" value="{{ $getSupplier->id }}">
                                    <input type="hidden" name="supplier_slug" value="{{ $getSupplier->supplier_slug }}">
                                    <input type="text" name="supplier_name" class="form-control" placeholder="e.g: First Supplier" value="{{ old('supplier_name', $getSupplier->supplier_name) }}" required>
                                </div>
                                @if($errors->has('supplier_name'))
                                <label id="name-error" class="error" for="name">{{ $errors->first('supplier_name')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Email</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('supplier_email') ? 'error' : ''}}">
                                    <input type="email" name="supplier_email" class="form-control" placeholder="e.g: email@gmail.com" value="{{ old('supplier_email', $getSupplier->supplier_email) }}" required>
                                </div>
                                @if($errors->has('supplier_name'))
                                <label id="email-error" class="error" for="email">{{ $errors->first('supplier_email')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Phone</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('supplier_phone') ? 'error' : ''}}">
                                    <input type="number" name="supplier_phone" class="form-control" placeholder="e.g: 021745232" value="{{ old('supplier_phone', $getSupplier->supplier_phone) }}" required>
                                </div>
                                @if($errors->has('supplier_phone'))
                                <label id="phone-error" class="error" for="phone">{{ $errors->first('supplier_phone')}}</label>
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
                                <div class="form-line {{ $errors->has('supplier_address') ? 'error' : ''}}">
                                    <textarea name="supplier_address" class="form-control" placeholder="e.g: Jl. Jalan Yuk Kita" required>{{ old('supplier_address', $getSupplier->supplier_address)}}</textarea>
                                </div>
                                @if($errors->has('supplier_address'))
                                <label id="address-error" class="error" for="address">{{ $errors->first('supplier_address')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                                       

                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                            <a href="{{ route('supplier.index') }}" class="btn btn-default m-t-15 waves-effect">Back</a>
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
                'supplier_name': {
                    required: true
                },
                'supplier_address': {
                    required: true
                },
                'supplier_email': {
                    required: true
                },
                'supplier_phone': {
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