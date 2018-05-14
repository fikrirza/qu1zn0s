@extends('layouts.master')

@section('title')
<title>Stock Summary</title>
@endsection

@section('headscript')
<link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
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
            <li class="active">Stock Summary</li>
        </ol>
    </div>
</div>


<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>STOCK SUMMARY</h2>
            </div>
            <div class="body">
                <div class="table-responsive">

                    <ul class="list-group">
                        <li class="list-group-item clearfix">
                            <form class="form-inline text-center">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select name="f_warehouse" class="form-control" onchange="this.form.submit()">
                                                    <option value="">Filter Warehouse</option>
                                                    <option value="">Menteng</option>
                                                    <option value="">Gading</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select name="f_item_cat" class="form-control" onchange="this.form.submit()">
                                                    <option value="">Filter Item Category</option>
                                                    <option value="">Sauces</option>
                                                    <option value="">Box</option>
                                                    <option value="">BreadS</option>
                                                    <option value="">Vegetables</option>
                                                    <option value="">Fruits</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </li>
                    </ul>

                    <table class="table table-hover table-bordered basic-example dataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Item</th>
                                <th>Available</th>
                                <th>Incoming</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>White Bread /box</td>
                                <td class="align-center">-</td>
                                <td class="align-center">50</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Round Bread /box</td>
                                <td class="align-center">6</td>
                                <td class="align-center">75</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Ketchup /liter</td>
                                <td class="align-center">5</td>
                                <td class="align-center">20</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Salad /kg</td>
                                <td class="align-center">6</td>
                                <td class="align-center">-</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Take Away Box /box</td>
                                <td class="align-center">200</td>
                                <td class="align-center">-</td>
                            </tr>
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