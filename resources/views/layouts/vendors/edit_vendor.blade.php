@extends('dashboard')
@section('title', 'Edit Vendor Account')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Vendor Account</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit vendor Account</li>
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
              <h3 class="box-title">Edit vendor Account</h3>
            </div>
            <div class="col-md-12 text-right toolbar-icon">
              <a href="{{route('vendor.show',$vendor->id)}}" class="label label-info" title="vendor Details"><i class="fa fa-file-text"></i></a>
              <a href="{{route('vendor.index')}}" title="View {{Session::get('_types')}} vendors" class="label label-success"><i class="fa fa-list"></i></a>
              {{-- <a href="{{route('vendor.delete',$vendor->id)}}" class="label label-danger" title="Delete this account"><i class="fa fa-trash"></i></a> --}}
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('vendor.update', $vendor)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="box-body">
                    <div class="col-md-12">
                        
                        <div class="form-group label-floating">
                            <label
                                for="name"
                                class="control-label"
                            >Name:</label>
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
                                for="business_name"
                                class="control-label"
                            >Business Name:</label>
                            <input
                                type="text"
                                name="business_name"
                                id="business_name"
                                value="{{ old('business_name', null) }}"
                                class="form-control"
                            >
                        </div>
                        <div class="form-group label-floating">
                            <label
                                for="address"
                                class="control-label"
                            >Address:</label>
                            <textarea
                                name="address"
                                id="address"
                                class="form-control"
                                rows="1"
                            >{{ old('address', null) }}</textarea>
                        </div>
                       
                        <div class="form-group label-floating">
                            <label
                                for="email"
                                class="control-label"
                            >Email Address: (Optional)</label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email', null) }}"
                                class="form-control"
                            >
                        </div>
                        
                        <div class="form-group label-floating">
                            <label
                                for="contact"
                                class="control-label"
                            >Contact No:</label>
                            <input
                                type="text"
                                name="contact"
                                id="contact"
                                value="{{ old('contact', null) }}"
                                class="form-control"
                            >
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
                                rows="2"
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
                        <input type="checkbox" name="status" value="1">
                    </div>
                    <div class="form-group label-floating">
                        <label for="">Image:</label>
                        <input
                            type="file"
                            name="image"
                            id="image"
                        >
                    </div>
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Save</button>
            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection