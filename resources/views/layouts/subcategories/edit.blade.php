@extends('dashboard')
@section('title', 'Edit Subcategory')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Edit Subcategory</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Edit Subcategory</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row"> <!-- left column -->
    <div class="col-md-6"> <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Subcategory</h3>
        </div>
        <div class="col-md-12 text-right toolbar-icon">
          <a href="{{route('subcat.show', $subcat->id)}}" class="label label-info" title="subcat Details"><i class="fa fa-file-text"></i></a>
          <a href="{{route('subcat.index')}}" title="View" class="label label-success"><i class="fa fa-list"></i></a>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('subcat.update', $subcat->id)}}" method="POST">
          @csrf
          @method('PUT')
        <div class="box-body">
          <div class="form-group">
            <label for="subcat" class="control-label"> Name: </label>
            <input type="text" name="name" id="name" value="{{ old('name', $subcat->name) }}" class="form-control">
          </div>
          <div class="form-group">
            <label for="category" class="control-label">Category:</label>
            <select name="category_id" id="category" class="form-control">
              <option value="">Select One</option>
              @foreach($categories as $cat)
                <option value="{{$cat->id}}" {{$cat->id == $subcat->category_id ? 'selected' : ''}}>{{$cat->name}}</option>
              @endforeach
            </select>
          </div>
          
          <div class="form-group">
            <label for="details" class="control-label"> Details:</label>
            <textarea name="details" id="details" class="form-control" rows="4" cols="45">{{ $subcat->details }}</textarea>
          </div>
          <div class="form-group">
            <label for="status" class="control-label" >
                Status
            </label>
            <input type="checkbox" name="status" id="status" value="Active" {{$subcat->status == 'Active' ? 'checked' : ''}}>
          </div>
          
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary pull-right">Update</button>
        </div>
        </form>
      </div> <!-- /.box -->

    </div> <!--/.col (left) -->
  </div> <!-- /.row -->
</section> <!-- /.content -->
@endsection