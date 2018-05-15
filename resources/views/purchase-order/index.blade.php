@extends('layouts.master')

@section('title')
<title>Purchase Order</title>
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
        @can('create-po')
        <a href="{{ route('po.add') }}" class="btn btn-primary waves-effect"><i class="material-icons">add</i><span>Add Purchase Order</span></a>
        @endcan
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 align-right">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li class="active">Purchase Order</li>
        </ol>
    </div>
</div>


<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>PURCHASE ORDER LIST</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered basic-example dataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>PO Number</th>
                                <th>Supplier</th>
                                <th>Expected Delivery</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($getPurchase as $key)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $key->name }}</td>
                                <td>{{ $key->address }}</td>
                                <td>@if($key->flag_status == 'Y')
                                        <a href="" class="label label-primary waves-effect inactive" data-value="{{ $key->id }}" data-toggle="modal" data-target="#modal-inactive">Active</a>
                                    @else
                                        <a href="" class="label label-danger waves-effect active" data-value="{{ $key->id }}" data-toggle="modal" data-target="#modal-active">Not Active</a>
                                    @endif
                                </td>
                                <td><a href="{{ route('warehouse.edit', ['slug' => $key->slug ]) }}" class="btn btn-warning btn-md waves-effect">Update</a></td>
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