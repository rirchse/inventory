@extends('dashboard')
@section('title', 'Create New Category')
@section('content')
 <section class="content-header">
      <h1>Create Category</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Categorys</a></li>
        <li class="active">Create Category</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row"> <!-- left column -->
        <div class="col-md-12"> <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 style="color: #800" class="box-title">Category Details</h3>
            </div>
            <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data" >
            @csrf
            <div class="box-body">
              <div class="form-group label-floating">
                <label for="name" class="control-label" > Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name', null) }}" class="form-control" >
              </div>
              <div class="form-group label-floating">
                <label for="details" class="control-label" > Details: </label>
                <textarea name="details" id="details" class="form-control" rows="4" cols="45" >{{ old('details', null) }}</textarea>
              </div>
              <div class="form-group label-floating">
                <label for="status" class="control-label" > Status:</label>
                <input type="checkbox" name="status" value="Active">
              </div>

            <button type="submit" class="btn btn-primary pull-right">Save</button>
            <div class="clearfix"></div>
            </form>
            
          </div> <!-- /.box -->
        </div> <!--/.col (left) -->
      </div> <!-- /.row -->
    </section> <!-- /.content -->
@endsection