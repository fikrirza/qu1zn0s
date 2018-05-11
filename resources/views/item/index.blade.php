@extends('layouts.master')

@section('title')
<title>Items</title>
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
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <a href="{{ route('items.add') }}" class="btn btn-primary waves-effect"><i class="material-icons">add</i><span>Add Item</span></a>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 align-right">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li class="active">Item</li>
        </ol>
    </div>
</div>


<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>ITEM LIST</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered basic-example dataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Item Category</th>
                                <th>Unit</th>
                                <th>Description</th>
                                <th>Min Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($getItems as $key)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $key->item_name }}</td>
                                <td>{{ $key->item_sku }}</td>
                                <td>{{ $key->itemCategory->category_name }}</td>
                                <td>{{ $key->item_unit }}</td>
                                <td>{{ $key->item_description }}</td>
                                <td>{{ $key->item_min_stock }}</td>
                                <td><a href="{{ route('items.edit', ['id' => $key->id ]) }}" class="btn btn-warning btn-md waves-effect">Update</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('bottomscript')
<script src="{{ asset('plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>

<script>
    $(function () {
        $('.basic-example').DataTable({
            responsive: true
        });
    });
</script>
@endsection