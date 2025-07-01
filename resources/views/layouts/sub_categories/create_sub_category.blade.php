@extends('dashboard')
@section('title', 'Create New Sub Category')
@section('content')
<section class="content-header">
  <h1>Create Sub-Category</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Sub-Categorys</a></li>
    <li class="active">Create Sub-Category</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 style="color: #800" class="box-title">Sub-Category Details</h3>
      </div>
      <form
          method="POST"
          action="{{ route('sub_category.store') }}"
          enctype="multipart/form-data"
      >
          @csrf
      <div class="box-body">
        <div class="col-md-12">         
            <div class="form-group label-floating">
                <label
                    for="name"
                    class="control-label"
                >
                    Name: *
                </label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name', null) }}"
                    class="form-control"
                >
            </div>  
            <div class="form-group label-floating">
                <label
                    for="parent_id"
                    class="control-label"
                >
                    Select Category: *
                </label>
                <select name="parent_id" class="form-control">
                    <option value="">Select Category</option>
                    @foreach($categoris as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>       
            <div class="form-group label-floating">
                <label
                    for="details"
                    class="control-label"
                >
                    Details:
                </label>
                <textarea
                    name="details"
                    id="details"
                    class="form-control"
                    rows="4"
                    cols="45"
                >{{ old('details', null) }}</textarea>
            </div>
            <div class="form-group label-floating">
              <b>Status:</b> <br>
              <label
                  for="status"
                  class="control-label"
              >
                  Active:
              </label>
              {!! Form::checkbox('status', '1','checked'); !!}
          </div>
          <button type="submit" class="btn btn-primary pull-right">Save</button>
      </div>
      <div class="clearfix"></div>
      {!! Form::close() !!}
  </div> <!-- /.box -->
</div> <!--/.col (left) -->
</div> <!-- /.row -->
</section> <!-- /.content -->
@endsection