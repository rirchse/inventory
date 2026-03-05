@extends('dashboard')
@section('title', 'Edit Group')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Edit Group</h1>
  <ol class="breadcrumb">
    <li><a href="{{route('group.index')}}"><i class="fa fa-dashboard"></i> Groups</a></li>
    <li class="active">Edit Group</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row"> <!-- left column -->
    <div class="col-md-12"> <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Group</h3>
        </div>
        <div class="col-md-12 text-right toolbar-icon">
          <a href="{{route('group.show', $group->id)}}" class="label label-info" title="group Details"><i class="fa fa-file-text"></i></a>
          <a href="{{route('group.index')}}" title="View" class="label label-success"><i class="fa fa-list"></i></a>
          {{-- <form action="{{ route('group.destroy', $group->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="label label-danger" style="border:none; cursor:pointer;" 
                        onclick="return confirm('Are you sure you want to delete this group?')">
                    <i class="fa fa-trash"></i>
                </button>
            </form> --}}
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('group.update', $group->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="box-body">
            <div class="form-group">
                <label for="name" class="control-label"> Name: </label>
                <input type="text" name="name" id="name" value="{{ old('name', $group->name) }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="category" class="control-label">Category:</label>
                <select name="category_id" id="category" class="form-control">
                <option value="">Select Category</option>
                @foreach($categories as $cat)
                    <option value="{{$cat->id}}" {{$cat->id == $group->category_id ? 'selected' : ''}}>{{$cat->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="category" class="control-label">Sub Category:</label>
                <select name="subcategory_id" id="subcategory" class="form-control">
                <option value="">Select Sub Category</option>
                @foreach($subcategories as $subcat)
                    <option value="{{$subcat->id}}" {{$subcat->id == $group->subcategory_id ? 'selected' : ''}}>{{$subcat->name}}</option>
                @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="details" class="control-label"> Details:</label>
                <textarea name="details" id="details" class="form-control" rows="4" cols="45">{{ $group->details }}</textarea>
            </div>
            <div class="form-group">
                <label for="status" class="control-label" >
                    Status
                </label>
                <input type="checkbox" name="status" id="status" value="Active" {{ $group->status == 'Active' ? 'checked' : '' }}>
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