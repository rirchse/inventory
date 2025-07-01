@extends('dashboard')
@section('title', 'Edit Customer Account')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Customer Account</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Edit Customer Account</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row"><!-- left column -->
    <div class="col-md-10"><!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Customer Account</h3>
        </div>
        <div class="col-md-12 text-right toolbar-icon">
          <a href="{{route('customer.show',$customer->id)}}" class="label label-info" title="customer Details"><i class="fa fa-file-text"></i></a>
          <a href="{{route('customer.index')}}" title="View {{Session::get('_types')}} customers" class="label label-success"><i class="fa fa-list"></i></a>
          {{-- <a href="{{route('customer.delete',$customer->id)}}" class="label label-danger" title="Delete this account"><i class="fa fa-trash"></i></a> --}}
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        {!! Form::model($customer, ['route' => ['customer.update', $customer->id], 'method' => 'PUT', 'files' => true]) !!}
        <div class="box-body">
        <div class="col-md-6">
            <div class="form-group label-floating">
                <label
                    for="full_name"
                    class="control-label"
                >
                    Customer Name: *
                </label>
                <input
                    type="text"
                    name="full_name"
                    id="full_name"
                    value="{{ old('full_name', $customer->full_name) }}"
                    class="form-control"
                    placeholder="Customer Full Name"
                >
            </div>
            <div class="form-group label-floating">
                <label
                    for="contact"
                    class="control-label"
                >
                    Mobile Number: *
                </label>
                <input
                    type="text"
                    name="contact"
                    id="contact"
                    value="{{ old('contact', $customer->contact) }}"
                    class="form-control"
                    placeholder="Mobile Number"
                >
            </div>
            <div class="form-group label-floating">
                <label
                    for="email"
                    class="control-label"
                >
                    Email (Optional):
                </label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email', $customer->email) }}"
                    class="form-control"
                    placeholder="example@email.com"
                >
            </div>
        </div>
        <div class="col-md-6">
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
                    placeholder="Present Address"
                    rows="7"
                >{{ old('address', $customer->address) }}</textarea>
            </div>
        </div>
        <div class="clearfix"></div>
      </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Save</button>
        </div>
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