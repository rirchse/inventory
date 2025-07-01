@extends('dashboard')
@section('title', 'Add New Vendor')
@section('content')
 <section class="content-header">
      <h1>Add Vendor</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Vendors</a></li>
        <li class="active">Add Vendor</li>
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
              <h3 style="color: #800" class="box-title">Vendor Information</h3>
            </div>
            <form
                method="POST"
                action="{{ route('vendor.store') }}"
                enctype="multipart/form-data"
            >
                @csrf
                <div class="box-body">
                    <div class="col-md-12">
                        
                        <div class="form-group label-floating">
                            {!! html_entity_decode( Form::label('name', 'Name: <span class="text-danger">*</span>', ['class' => 'control-label']) )!!}
                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', null) }}"
                                class="form-control"
                            >
                        </div>
                        <div class="form-group label-floating">
                            {!! html_entity_decode( Form::label('business_name', 'Business Name: <span class="text-danger">*</span>', ['class' => 'control-label']) )!!}
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
                            >
                                Address:
                            </label>
                            <textarea
                                name="address"
                                id="address"
                                class="form-control"
                                rows="2"
                            >{{ old('address', null) }}</textarea>
                        </div>
                       
                        <div class="form-group label-floating">
                            <label
                                for="email"
                                class="control-label"
                            >
                                Email Address: (Optional)
                            </label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email', null) }}"
                                class="form-control"
                            >
                        </div>
                        
                        <div class="form-group label-floating">
                            {!! html_entity_decode( Form::label('contact', 'Contact No: <span class="text-danger">*</span>', ['class' => 'control-label']) )!!}
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
                    <div class="form-group label-floating">
                        {{ Form::label('image', 'Image:', ['class' => 'control-label']) }}
                        <input
                            type="file"
                            name="image"
                            id="image"
                        >
                    </div>
                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Save</button>
                </div>
                    <div class="clearfix"></div>
            </form>
          </div> <!-- /.box -->
        </div> <!--/.col (left) -->
      </div> <!-- /.row -->
    </section> <!-- /.content -->
@endsection