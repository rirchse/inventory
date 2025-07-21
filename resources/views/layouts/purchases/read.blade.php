@extends('dashboard')
@section('title', 'purchase Details')
@section('content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>purchase Details</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> purchases</a></li>
        <li class="active">Details</li>
      </ol>    
    </section>

    <!-- Main content -->
  <section class="content">
    <div class="row"><!-- left column -->
      <div class="col-md-8"><!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h4 class="box-title">purchase Information</h4>
          </div>
          <div class="col-md-12 text-right toolbar-icon">
            <a href="{{route('purchase.create')}}" title="Add New purchase" class="label label-info"><i class="fa fa-plus"></i></a>
            <a href="{{route('purchase.index')}}" title="View" class="label label-success"><i class="fa fa-list"></i></a>
            <a href="{{route('purchase.edit', $purchase->id)}}" class="label label-warning" title="Edit this purchase"><i class="fa fa-edit"></i></a>
            
            {{-- <a href="{{route('purchase.delete',$purchase->id)}}" class="label label-danger" onclick="return confirm('Are you sure want to delete this account!');" title="Delete this account"><i class="fa fa-close"></i></a> --}}
            
          </div>
          <div class="col-md-12">
            <table class="table">
                <tbody>
                  <tr>
                    <th style="width: 200px;">Name:</th>
                    <td>{{$purchase->name}}</td>
                  </tr>
                  <tr>
                    <th>Category:</th>
                    <td>{{$purchase->cat_id?App\Category::find($purchase->cat_id)->name:''}}</td>
                  </tr>
                  <tr>
                    <th>Sub Category:</th>
                    <td>{{$purchase->sub_cat_id?App\Subcategory::find($purchase->sub_cat_id)->name:''}}</td>
                  </tr>
                  <tr>
                    <th>Vendor:</th>
                    <td>{{$purchase->vendor?App\Vendor::find($purchase->vendor)->name:''}}</td>
                  </tr>
                <tr>
                    <th>Brand:</th>
                    <td>{{$purchase->brand}}</td>
                  </tr>
                <tr>
                    <th>MRP Price:</th>
                    <td>{{$purchase->mrp_price}}</td>
                  </tr>
                <tr>
                    <th>Credit Price:</th>
                    <td>{{$purchase->credit_price}}</td>
                  </tr>
                <tr>
                <tr>
                  <th>Cash Price:</th>
                  <td>{{$purchase->cash_price}}</td>
                </tr>
                <tr>
                  <th>Buying Price:</th>
                  <td>{{$purchase->buying_price}}</td>
                </tr>
                <tr>
                    <th>Serial No:</th>
                    <td>{{$purchase->serial_no}}</td>
                  </tr>
                  <tr>
                    <th>Details:</th>
                    <td>{{$purchase->details}}</td>
                  </tr>
                
                   <tr>
                    <th>Status:</th>
                    <td>
                      @if($purchase->status == 0)
                      <span class="label label-warning">Unactive</span>
                      @elseif($purchase->status == 1)
                      <span class="label label-success">Active</span>
                      @elseif($purchase->status == 2)
                      <span class="label label-danger">Disabled</span>
                      @endif
                    </td>
                  </tr>
                  
                  <tr>
                    <th>purchase Buying Date:</th>
                    <td>{{date('d M Y h:i:s A',strtotime($purchase->buying_date) )}} </td>
                  </tr>
                  <tr>
                    <th>Record Created On:</th>
                    <td>{{date('d M Y h:i:s A',strtotime($purchase->created_at) )}} </td>
                  </tr>
                  <tr>
                    <th>Record Updated On:</th>
                    <td>{{date('d M Y h:i:s A',strtotime($purchase->updated_at) )}} </td>
                  </tr>
              </tbody>
            </table>
          </div>
          <div class="clearfix"></div>
        </div>
      </div><!-- /.box -->
    </div><!--/.col (left) -->
  </section><!-- /.content -->
   
@endsection
