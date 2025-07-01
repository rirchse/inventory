@extends('dashboard')
@section('title', 'Order Add to return')
@section('content')

{{-- {{dd($sale)}} --}}
<section class="content-header">
  <h1>Order Returned</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Customer Payments</a></li>
    <li class="active">Add Customer Payment</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row"> <!-- left column -->
    <div class="col-md-6"> <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 style="color: #800" class="box-title">Order Details <b> [ #{{$sale->id}} ]</b></h3>
        </div>
        <form
            method="POST"
            action="{{ route('return.store') }}"
            enctype="multipart/form-data"
        >
            @csrf
        <div class="box-body">
          <table class="table border" style="border:1px solid #ddd">
            <tr>
              <td>Customer Name: <b>{{$sale->full_name}}</b></td>
            </tr>
            <tr>
              <td>Contact Number: <b>{{$sale->contact}}</b></td>
            </tr>
            <tr>
              <td>Order Number: <b> #{{$sale->id}}</b></td>
            </tr>
            <tr>
              <td>Total Amount: <b>{{$sale->gtotal}} tk</b></td>
            </tr>
          </table><br>
          <input
              type="hidden"
              name="sales_id"
              id="sales_id"
              value="{{ old('sales_id', $sale->id) }}"
          >
            <div class="form-group">
              <label
                  for="comment"
                  class="control-label"
              >
                  Comment:
              </label>
              <textarea
                  name="comment"
                  id="comment"
                  class="form-control"
                  placeholder="Why returned the order?"
                  rows="3"
              >{{ old('comment', null) }}</textarea>
            </div>
            <div class="form-group">
              <label
                  for="date"
                  class="control-label"
              >
                  Return Date:
              </label>
              <input
                  type="date"
                  name="date"
                  id="date"
                  value="{{ old('date', null) }}"
                  class="form-control"
              >
            </div>
            <div class="form-group">
              <label
                  for="delivery_man"
                  class="control-label"
              >
                  Delivery Man (Optional):
              </label>
              <input
                  type="text"
                  name="delivery_man"
                  id="delivery_man"
                  value="{{ old('delivery_man', null) }}"
                  class="form-control"
                  placeholder="(Optional)"
              >
            </div>

          <button type="submit" class="btn btn-primary pull-right">Save</button>
          <div class="clearfix"></div>
          </form>

        </div> <!-- /.box -->
      </div> <!--/.col (left) -->
    </div> <!-- /.row -->
  </section> <!-- /.content -->
  @endsection