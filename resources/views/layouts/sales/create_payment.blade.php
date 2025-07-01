@extends('dashboard')
@section('title', 'Add Customer Payment')
@section('content')

{{-- {{dd($sale)}} --}}
<section class="content-header">
  <h1>Add Customer Payment</h1>
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
            action="{{ route('payment.store') }}"
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
              <td>Grand Total: <b>{{$sale->gtotal}} tk</b> &nbsp; &nbsp;  Paid: <b>{{$sale->paid}} tk</b>  &nbsp; &nbsp; Due Amount: <b>{{$sale->due}} tk</b></td>
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
                  for="paid_amount"
                  class="control-label"
              >
                  Paid Amount:
              </label>
              <input
                  type="text"
                  name="paid_amount"
                  id="paid_amount"
                  value="{{ old('paid_amount', null) }}"
                  class="form-control"
                  placeholder="00.00 tk"
              >
            </div>
            <div class="form-group">
              <label
                  for="payment_type"
                  class="control-label"
              >
                  Payment Type:
              </label>
              <select
                  name="payment_type"
                  id="payment_type"
                  class="form-control"
              >
                  @foreach (['' => '', 'bKash' => 'bKash', ' Rocket' => 'Rocket', 'Nagad' => 'Nagad', 'Cash' => 'Cash', 'Bank' => 'Bank', 'Others' => 'Others'] as $optionValue => $optionText)
                      <option 
                          value="{!! e($optionValue, false) !!}" 
                          @selected (in_array($optionValue, (array) (old('payment_type', null))))
                      >{!! e($optionText, false) !!}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label
                  for="date"
                  class="control-label"
              >
                  Payment Date:
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
                  for="note"
                  class="control-label"
              >
                  Note:
              </label>
              <textarea
                  name="note"
                  id="note"
                  class="form-control"
                  rows="2"
              >{{ old('note', null) }}</textarea>
            </div>

          <button type="submit" class="btn btn-primary pull-right">Save</button>
          <div class="clearfix"></div>
          </form>

        </div> <!-- /.box -->
      </div> <!--/.col (left) -->
    </div> <!-- /.row -->
  </section> <!-- /.content -->
  @endsection