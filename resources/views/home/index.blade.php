@extends('layouts.master')


@section('title')
<title>Beranda</title>
@endsection



@section('content')
<div class="row clear-fix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-right">
		<ol class="breadcrumb">
			<li class="active">Beranda</li>
		</ol>
	</div>
</div>


<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>Barcode Sample</h2>
			</div>
			<div class="body">
				{!! DNS1D::getBarcodeHTML("STT15052018001", "C128",1,66) !!}&nbsp;
				{!! DNS1D::getBarcodeHTML("STT15052018002", "C128",1,66) !!}&nbsp;
				{!! DNS1D::getBarcodeHTML("STT15052018003", "C128",1,66) !!}&nbsp;
				{!! DNS1D::getBarcodeHTML("STT15052018004", "C128",1,66) !!}&nbsp;
				{!! DNS1D::getBarcodeHTML("STT15052018005", "C128",1,66) !!}&nbsp;
				{!! DNS1D::getBarcodeHTML("STT15052018006", "C128",1,66) !!}&nbsp;
				{!! DNS1D::getBarcodeHTML("STT15052018007", "C128",1,66) !!}&nbsp;
				{!! DNS1D::getBarcodeHTML("STT15052018008", "C128",1,66) !!}&nbsp;
				<br/>
				<br/>
			</div>
		</div>
	</div>
</div>




@endsection