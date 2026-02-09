@extends('dashboard')
@section('title', 'Create New Subcategory')
@section('content')
 <section class="content-header">
      <h1>Create Subcategory</h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Subcategorys</a></li>
        <li class="active">Create Subcategory</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row"> <!-- left column -->
        <div class="col-md-6"> <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 style="color: #800" class="box-title">Subcategory Details</h3>
            </div>
            <form method="POST" action="{{ route('subcategory.store') }}" enctype="multipart/form-data">
              @csrf
            <div class="box-body">
              <div class="form-group">
                <label for="name" class="control-label">Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name', null) }}" class="form-control">
              </div>
              <div class="form-group">
                <label for="category" class="control-label">Category:</label>
                <select name="category_id" id="category" class="form-control">
                  <option value="">Select One</option>
                  @foreach($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="details" class="control-label">Details</label>
                <textarea name="details" id="details" class="form-control" rows="4" cols="45">{{ old('details', null) }}</textarea>
              </div>
              <div class="form-group">
                <b>Status:</b>
                <label for="status" class="control-label">
                  <input type="checkbox" name="status" id="" value="Active">
                </label>
              </div>

            <button type="submit" class="btn btn-primary pull-right">Save</button>
                <div class="clearfix"></div>
            </form>
            
          </div> <!-- /.box -->
        </div> <!--/.col (left) -->
      </div> <!-- /.row -->
    </section> <!-- /.content -->
@endsection