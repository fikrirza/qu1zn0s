@extends('layouts.master')

@section('title')
<title>Orders</title>
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
        <a href="{{ route('orders.add') }}" class="btn btn-primary waves-effect"><i class="material-icons">add</i><span>Add Order</span></a>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 align-right">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li class="active">Orders</li>
        </ol>
    </div>
</div>


<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>ORDER LIST</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered basic-example dataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Order No</th>
                                <th>Order Date</th>
                                <th>Warehouse</th>
                                <th>Status</th>
                                <th>Created By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php
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
                                    <td><a href="{{ route('supplier.edit', ['supplier_slug' => $key->supplier_slug ]) }}" class="btn btn-warning btn-md waves-effect">Update</a></td>
                                </tr>
                            @endforeach --}}
                            <tr>
                                <td>1</td>
                                <td>O-0000004</td>
                                <td>16/05/2018</td>
                                <td>Menteng Branch</td>
                                <td>DRAFT</td>
                                <td>User-1</td>
                                <td><a href="{{ route('orders.detail', ['order_no' => 'O-0000004' ]) }}" class="btn btn-warning btn-md waves-effect">Detail</a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>O-0000003</td>
                                <td>14/05/2018</td>
                                <td>Gading Branch</td>
                                <td>SHIPPED PACKAGES</td>
                                <td>User-2</td>
                                <td><a href="{{ route('orders.detail', ['order_no' => 'O-0000003' ]) }}" class="btn btn-warning btn-md waves-effect">Detail</a></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>O-0000002</td>
                                <td>04/05/2018</td>
                                <td>Menteng Branch</td>
                                <td>ISSUED</td>
                                <td>User-2</td>
                                <td><a href="{{ route('orders.detail', ['order_no' => 'O-0000002' ]) }}" class="btn btn-warning btn-md waves-effect">Detail</a></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>O-0000001</td>
                                <td>01/05/2018</td>
                                <td>Gading Branch</td>
                                <td>COMPLETED</td>
                                <td>User-1</td>
                                <td><a href="{{ route('orders.detail', ['order_no' => 'O-0000001' ]) }}" class="btn btn-warning btn-md waves-effect">Detail</a></td>
                            </tr>
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