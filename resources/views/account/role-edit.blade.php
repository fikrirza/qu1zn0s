@extends('layouts.master')

@section('title')
<title>Role</title>
@endsection

@section('content')
<div class="row clear-fix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-right">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li><a href="{{ route('role.index') }}">Roles</a></li>
            <li class="active">Edit Role</li>
        </ol>
    </div>
</div>


<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>Edit Role</h2>
			</div>
			<div class="body">
				<form class="form-horizontal" id="form_validation" method="POST" action="{{ route('role.update') }}">
					{{ csrf_field() }}
					<div class="row clearfix">
						<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
							<label for="">Role Name</label>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
							<div class="form-group">
								<div class="form-line">
                                <input type="hidden" name="slug" value="{{ $getRole->slug }}">
                                <input type="hidden" name="id" value="{{ $getRole->id }}">
                                <input type="text" name="name" class="form-control" placeholder="e.g: Finance" value="{{ old('name', $getRole->name) }}" required>
								</div>
							</div>
						</div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Warehouse</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <input type="checkbox" name="permissions[read-warehouse]" id="md_checkbox_9" class="filled-in chk-col-red" {{ in_array('read-warehouse',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_9">Read</label>&nbsp;
                                <input type="checkbox" name="permissions[create-warehouse]" id="md_checkbox_10" class="filled-in chk-col-red" {{ in_array('create-warehouse',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_10">Create</label>&nbsp;
                                <input type="checkbox" name="permissions[update-warehouse]" id="md_checkbox_11" class="filled-in chk-col-red" {{ in_array('update-warehouse',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_11">Update</label>&nbsp;
                                <input type="checkbox" name="permissions[reset-warehouse]" id="md_checkbox_12" class="filled-in chk-col-red" {{ in_array('reset-warehouse',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_12">Reset</label>&nbsp;
                                <input type="checkbox" name="permissions[activate-warehouse]" id="md_checkbox_13" class="filled-in chk-col-red" {{ in_array('activate-warehouse',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_13">Activate</label>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Item</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <input type="checkbox" name="permissions[read-item]" id="md_checkbox_14" class="filled-in chk-col-red" {{ in_array('read-item',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_14">Read</label>&nbsp;
                                <input type="checkbox" name="permissions[create-item]" id="md_checkbox_15" class="filled-in chk-col-red" {{ in_array('create-item',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_15">Create</label>&nbsp;
                                <input type="checkbox" name="permissions[update-item]" id="md_checkbox_16" class="filled-in chk-col-red" {{ in_array('update-item',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_16">Update</label>&nbsp;
                                <input type="checkbox" name="permissions[reset-item]" id="md_checkbox_17" class="filled-in chk-col-red" {{ in_array('reset-item',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_17">Reset</label>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Item Category</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <input type="checkbox" name="permissions[read-itemCategory]" id="md_checkbox_18" class="filled-in chk-col-red" {{ in_array('read-itemCategory',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_18">Read</label>&nbsp;
                                <input type="checkbox" name="permissions[create-itemCategory]" id="md_checkbox_19" class="filled-in chk-col-red" {{ in_array('create-itemCategory',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_19">Create</label>&nbsp;
                                <input type="checkbox" name="permissions[update-itemCategory]" id="md_checkbox_20" class="filled-in chk-col-red" {{ in_array('update-itemCategory',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_20">Update</label>&nbsp;
                                <input type="checkbox" name="permissions[reset-itemCategory]" id="md_checkbox_21" class="filled-in chk-col-red" {{ in_array('reset-itemCategory',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_21">Reset</label>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Supplier</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <input type="checkbox" name="permissions[read-supplier]" id="md_checkbox_22" class="filled-in chk-col-red" {{ in_array('read-supplier',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_22">Read</label>&nbsp;
                                <input type="checkbox" name="permissions[create-supplier]" id="md_checkbox_23" class="filled-in chk-col-red" {{ in_array('create-supplier',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_23">Create</label>&nbsp;
                                <input type="checkbox" name="permissions[update-supplier]" id="md_checkbox_24" class="filled-in chk-col-red" {{ in_array('update-supplier',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_24">Update</label>&nbsp;
                                <input type="checkbox" name="permissions[reset-supplier]" id="md_checkbox_25" class="filled-in chk-col-red" {{ in_array('reset-supplier',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_25">Reset</label>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Purchase Order</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <input type="checkbox" name="permissions[read-po]" id="md_checkbox_26" class="filled-in chk-col-red" {{ in_array('read-po',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_26">Read</label>&nbsp;
                                <input type="checkbox" name="permissions[create-po]" id="md_checkbox_27" class="filled-in chk-col-red" {{ in_array('create-po',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_27">Create</label>&nbsp;
                                <input type="checkbox" name="permissions[update-po]" id="md_checkbox_28" class="filled-in chk-col-red" {{ in_array('update-po',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_28">Update</label>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Users</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <input type="checkbox" name="permissions[read-user]" id="md_checkbox_1" class="filled-in chk-col-red" {{ in_array('read-user',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_1">Read</label>&nbsp;
                                <input type="checkbox" name="permissions[create-user]" id="md_checkbox_2" class="filled-in chk-col-red" {{ in_array('create-user',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_2">Create</label>&nbsp;
                                <input type="checkbox" name="permissions[update-user]" id="md_checkbox_3" class="filled-in chk-col-red" {{ in_array('update-user',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_3">Update</label>&nbsp;
                                <input type="checkbox" name="permissions[reset-user]" id="md_checkbox_4" class="filled-in chk-col-red" {{ in_array('reset-user',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_4">Reset</label>&nbsp;
                                <input type="checkbox" name="permissions[activate-user]" id="md_checkbox_5" class="filled-in chk-col-red" {{ in_array('activate-user',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_5">Activate</label>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                            <label for="">Roles</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <input type="checkbox" name="permissions[read-role]" id="md_checkbox_6" class="filled-in chk-col-red" {{ in_array('read-role',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_6">Read</label>&nbsp;
                                <input type="checkbox" name="permissions[create-role]" id="md_checkbox_7" class="filled-in chk-col-red" {{ in_array('create-role',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_7">Create</label>&nbsp;
                                <input type="checkbox" name="permissions[update-role]" id="md_checkbox_8" class="filled-in chk-col-red" {{ in_array('update-role',$can) ? 'checked="checked"' : '' }} value="true" />
                                <label for="md_checkbox_8">Update</label>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                            <a href="{{ route('role.index') }}" class="btn btn-default m-t-15 waves-effect">Back</a>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection