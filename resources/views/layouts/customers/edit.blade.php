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
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('customer.update', $customer->id)}}" method="POSt" enctype="multipart/form-data">
          @csrf
          @method('PUT')
        <div class="box-body">
        <div class="col-md-6">
            <div class="form-group label-floating">
                <label for="name" class="control-label">
                    Customer Name: *
                </label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name', $customer->name) }}"
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
            <div class="form-group">
              <label for="balance">Balance:</label>
                <input class="form-control" type="number" name="balance" placeholder="0.00" value="{{old('balance', $customer->balance)}}" id="balance">
            </div>
            <div class="form-group">
              <label for="">Balance Type</label>
              <select class="form-control" name="balance_type" id="balance_type" onchange="balanceType(this)">
                <option value="">Select One</option>
                <option value="Due" {{$customer->balance_type == 'Due'? 'selected' : ''}}>Due</option>
                <option value="Advance" {{$customer->balance_type == 'Advance'? 'selected' : ''}}>Advance</option>
              </select>
            </div>
        </div>
        <div class="col-md-6">
          <div class="form-group label-floating">
              <label for="email" class="control-label">
                  Email (Optional):
              </label>
              <input type="email" name="email" id="email" value="{{ old('email', $customer->email) }}" class="form-control" placeholder="example@email.com">
          </div>
            <div class="form-group">
                <label for="address" class="control-label">
                    Address:
                </label>
                <textarea
                    name="address"
                    id="address"
                    class="form-control"
                    placeholder="Present Address"
                    rows="4"
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
</div> <!-- /.row -->
</section> <!-- /.content -->
<script>
  function balanceType(e)
  {
    const balance = document.getElementById('balance');
    const balance_type = document.getElementById('balance_type');
    let type = balance_type.value;

    let currentVal = balance.value;
    if (currentVal !== "")
    {
        if (type === "Due") {
            // If Due: Add (-) if it doesn't already start with it
            if (!currentVal.startsWith("-")) {
                balance.value = "-" + currentVal;
            }
        }
        else if (type === "Advance")
        {
            // If Advance: Remove (-) if it exists at the start
            if (currentVal.startsWith("-")) {
                balance.value = currentVal.substring(1);
            }
        }
    }
  }
</script>
@endsection