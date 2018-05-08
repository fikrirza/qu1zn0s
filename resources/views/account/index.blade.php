@extends('layouts.master')

@section('title')
<title>User Accounts</title>
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
        <a href="#" class="btn btn-primary waves-effect"><i class="material-icons">add</i><span>Add Account</span></a>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 align-right">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li class="active">Accounts</li>
        </ol>
    </div>
</div>


<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>ACCOUNT LIST</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered basic-example responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Warehouse</th>
                                <th>Avatar</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($getUser as $user)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->warehouse->name }}</td>
                                <td>{{ $user->avatar }}</td>
                                <td>@foreach($user->roles as $role)
                                        {{ $role->name }} ||
                                    @endforeach
                                </td>
                                <td>@if($user->confirmed == 1)
                                        <a href="" class="label label-primary waves-effect inactive" data-value="{{ $user->id }}" data-toggle="modal" data-target="#modal-inactive">Active</a>
                                    @else
                                        <a href="" class="label label-danger waves-effect active" data-value="{{ $user->id }}" data-toggle="modal" data-target="#modal-active">Not Active</a>
                                    @endif
                                </td>
                                <td><a href="#" class="btn btn-warning btn-xs waves-effect">Update</a></td>
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
				<h4 class="modal-title" id="defaultModalLabel">Acivation Account</h4>
			</div>
			<div class="modal-body">
				<p>Are You Sure to Disable This Account?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-active" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-col-blue">
			<div class="modal-header">
				<h4 class="modal-title" id="defaultModalLabel">Acivation Account</h4>
			</div>
			<div class="modal-body">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
			</div>
		</div>
	</div>
</div>

@endsection