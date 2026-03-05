@extends('dashboard')
@section('title', 'Edit New Supplier')
@section('content')
 <section class="content-header">
      <h1>Edit Supplier</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Suppliers</a></li>
        <li class="active">Edit Supplier</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row"> <!-- left column -->
        <div class="col-md-12"> <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-xs-9">
                        <h3 class="box-title">Supplier Details</h3>
                    </div>
                    <div class="col-xs-3 text-right">
                        <a href="{{route('supplier.show', $supplier->id )}}" title="View details" class="label label-info"><i class="fa fa-file-text"></i></a>
                        <a href="{{route('supplier.index')}}" title="View all suppliers" class="label label-success"><i class="fa fa-list"></i></a>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <form method="POST" action="{{ route('supplier.update', $supplier->id) }}" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name" class="control-label" > Name:</label>
                                <input type="text" name="name" id="name" value="{{ $supplier->name }}" class="form-control" required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact" class="control-label" > Contact / Mobile:</label>
                                <input type="text" placeholder="01300112233" name="contact" id="contact" value="{{ $supplier->contact }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="control-label" > Email:</label>
                                <input type="email" name="email" id="email" value="{{ $supplier->email }}" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address" class="control-label" > Address:</label>
                                <input type="text" name="address" id="address" value="{{ $supplier->address }}" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="business_name" class="control-label" > Business Name:</label>
                                <input type="text" name="business_name" id="business_name" value="{{ $supplier->business_name }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="details" class="control-label" > Details: </label>
                                <input type="text" name="details" id="details" class="form-control" value="{{ $supplier->details }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status" class="control-label" > Status:</label>
                                <input type="checkbox" name="status" id="status" value="{{ $supplier->status }}" {{ $supplier->status == 'Active' ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                    <div class="clearfix"></div>
                </form>
          </div> <!-- /.box -->
        </div> <!--/.col (left) -->
      </div> <!-- /.row -->
    </section> <!-- /.content -->
@endsection