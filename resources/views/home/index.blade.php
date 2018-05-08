@extends('layouts.master')


@section('title')
<title>Beranda</title>
@endsection

@section('headscript')
<link href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection


@section('content')
<ol class="breadcrumb">
	<li class="active">Beranda</li>
</ol>


<div class="row clearfix">
	<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
		<div class="info-box hover-zoom-effect">
			<div class="icon bg-red">
				<i class="material-icons">local_dining</i>
			</div>
			<div class="content">
				<div class="text"><a href="#">PAJAK RESTORAN</a></div>
			</div>
		</div>
	</div>
	<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
		<div class="info-box hover-zoom-effect">
			<div class="icon bg-pink">
				<i class="material-icons">home</i>
			</div>
			<div class="content">
				<div class="text"><a href="#">PAJAK PBB</a></div>
			</div>
		</div>

	</div>
	<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
		<div class="info-box hover-zoom-effect">
			<div class="icon bg-blue">
				<i class="material-icons">hotel</i>
			</div>
			<div class="content">
				<div class="text"><a href="#">PAJAK HOTEL</a></div>
			</div>
		</div>
	</div>
	<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
		<div class="info-box hover-zoom-effect">
			<div class="icon bg-light-blue">
				<i class="material-icons">mic</i>
			</div>
			<div class="content">
				<div class="text">PAJAK HIBURAN</div>
			</div>
		</div>
	</div>
	<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
		<div class="info-box hover-zoom-effect">
			<div class="icon bg-cyan">
				<i class="material-icons">image</i>
			</div>
			<div class="content">
				<div class="text">PAJAK REKLAME</div>
			</div>
		</div>
	</div>
	<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
		<div class="info-box hover-zoom-effect">
			<div class="icon bg-green">
				<i class="material-icons">motorcycle</i>
			</div>
			<div class="content">
				<div class="text">PAJAK PARKIR</div>
			</div>
		</div>
	</div>
</div>

@endsection


@section('bottomscript')
<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>

<script>
$(function () {
    $('.beranda-table').DataTable({
        responsive: true
    });
});
</script>
@endsection