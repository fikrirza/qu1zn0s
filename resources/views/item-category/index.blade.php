@extends('layouts.master')

@section('title')
<title>Item Category</title>
@endsection

@section('headscript')
<link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection

@section('content')

@if(Session::has('berhasil'))
<script>
window.setTimeout(function() {
	$(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
		$(this).remove();
	});
}, 5000);
</script>
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="alert bg-green alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			{{ Session::get('berhasil') }}
		</div>
	</div>
</div>
@endif


<div class="row clear-fix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-right">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li class="active">Item Category</li>
        </ol>
    </div>
</div>


<div class="row clearfix">
    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>ITEM CATEGORY LIST</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered basic-example dataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($getItemCategory as $key)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $key->category_name }}</td>
                                <td><a href="{{ route('itemCategory.edit', ['category_slug' => $key->category_slug ]) }}" class="btn btn-warning btn-md waves-effect">Update</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    @if($addForm == true)
    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>ADD NEW ITEM CATEGORY</h2>
            </div>
            <div class="body">
                <form class="form-horizontal form_validation" method="POST" action="{{ route('itemCategory.store') }}">
                    {{ csrf_field() }}
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Name</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('category_name') ? 'error' : ''}}">
                                    <input type="text" name="category_name" class="form-control" placeholder="e.g: Sauce" value="{{ old('category_name') }}" required autofocus>
                                </div>
                                @if($errors->has('category_name'))
                                    <label id="name-error" class="error" for="category_name">{{ $errors->first('category_name')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>                  
                    <div class="row clearfix">
                        <div class="col-lg-offset-8 col-md-offset-8 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @else
    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>UPDATE ITEM CATEGORY</h2>
            </div>
            <div class="body">
                <form class="form-horizontal form_validation" method="POST" action="{{ route('itemCategory.update') }}">
                    {{ csrf_field() }}
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Name</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('category_name') ? 'error' : ''}}">
                                    <input type="hidden" name="id" value="{{ $itemCategory->id }}">
                                    <input type="text" name="category_name" class="form-control" placeholder="e.g: Sauce" value="{{ old('category_name', $itemCategory->category_name) }}" required>
                                </div>
                                @if($errors->has('category_name'))
                                    <label id="name-error" class="error" for="category_name">{{ $errors->first('category_name')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>                  
                    <div class="row clearfix">
                        <div class="col-lg-offset-8 col-md-offset-8 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>


@endsection


@section('bottomscript')
<script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>

<script>
    $(function () {
        $('.basic-example').DataTable({
            responsive: true
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('.form_validation').validate({
            rules: {
                'category_name': {
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