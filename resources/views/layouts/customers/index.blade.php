@php
use \App\Http\Controllers\SourceCtrl;
$source = new SourceCtrl;
@endphp

@extends('dashboard')
@section('title', 'View All Customers')
@section('content')
    

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Customers Accounts</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Customers</a></li>
        <li class="active">Customers Accounts</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List of Customer Accounts</h3>
            <div class="box-tools text-right">
              <a href="{{route('customer.create')}}" class="btn btn-sm btn-info">
                <i class="fa fa-plus"></i> Add
              </a>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-hover">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Contact</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Balance Tk.</th>
                  <th>SMS Date</th>
                  <th width="130">Action</th>
                </tr>
                @foreach($customers as $customer)

                <tr>
                  <td>{{$customer->id}}</td>
                  <td>{{$customer->name}}</td>
                  <td>{{$customer->contact}}</td>
                  <td>{{$customer->email}}</td>
                  <td>{{$customer->address}}</td>
                  <td class="{{$customer->balance < 0 ? 'text-red':''}}">{{$customer->balance}}</td>

                  <td>{{ $source->dformat($customer->sms_sent_at)}}</td>
                  <td>
                    <a href="{{route('customer.show', $customer->id)}}" class="btn btn-sm btn-info" title="Customer details">
                      <i class="fa fa-file-text"></i>
                    </a>
                    <a href="{{route('customer.edit', $customer->id)}}" class="btn btn-sm btn-warning" title="Edit this customer">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{route('customer.send-sms', $customer->id)}}" class="btn btn-sm btn-success" title="Send SMS" onclick="return confirm('Are you sure you want to send sms to this user?')">
                      <i class="fa fa-send"></i>
                    </a>
                  </td>
                </tr>

                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <div class="pagination-sm no-margin pull-right">
                {{$customers->links()}}
              </div>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
@endsection
{{-- @section('scripts')
  <script>
    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>
@endsection --}}