@extends('layouts.master')

@section('title')
<title>Supplier</title>
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
        @can('create-supplier')
        <a href="{{ route('supplier.add') }}" class="btn btn-primary waves-effect"><i class="material-icons">add</i><span>Add Supplier</span></a>
        @endcan
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 align-right">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li class="active">Supplier</li>
        </ol>
    </div>
</div>


<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>SUPPLIER LIST</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered basic-example dataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                @can('update-supplier')
                                <th>Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($getSupplier as $key)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $key->supplier_code }}</td>
                                <td>{{ $key->supplier_name }}</td>
                                <td>{{ $key->supplier_email }}</td>
                                <td>{{ $key->supplier_phone }}</td>
                                <td>{{ $key->supplier_address }}</td>
                                @can('update-supplier')
                                <td><a href="{{ route('supplier.edit', ['supplier_slug' => $key->supplier_slug ]) }}" class="btn btn-warning btn-md waves-effect">Update</a></td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-inactive" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-col-red">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Acivation Supplier</h4>
            </div>
            <div class="modal-body">
                <p>Are You Sure to Disable This Supplier?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Yes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-active" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-col-blue">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Acivation Supplier</h4>
            </div>
            <div class="modal-body">
                <p>Are You Sure to Activate This Supplier?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Yes</button>
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