@php
use \App\Http\Controllers\SourceCtrl;
$source = new SourceCtrl;
@endphp

@extends('dashboard')
@section('title', 'View All Purchase')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>All Purchase</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    {{-- <li><a href="#">Tables</a></li> --}}
    <li class="active">All Purchase</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">List of Purchase</h3>
              <div class="box-tools">
                <a href="{{route('purchase.create')}}" class="btn btn-sm btn-info">
                  <i class="fa fa-plus"></i> Add
                </a>
                <div class="input-group input-group-sm" style="float:right; width: 150px;margin-left:15px">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-hover">
                <tr>
                  <th>Id</th>
                  <th>Voucher No.</th>
                  <th>Total</th>                  
                  <th>Grand Total</th>
                  <th>Paid</th>
                  <th>Due</th>
                  {{-- <th>Status</th> --}}
                  <th>Date</th>
                  <th width="110">Action</th>
                </tr>
                @foreach($purchases as $value)
                <tr>
                  <td>{{$value->id}}</td>
                  <td>{{$value->voucher_no}}</td>
                  <td>{{number_format($value->total)}}</td>
                  <td>{{$value->grand_total}}</td>
                  <td>{{$value->paid}}</td>
                  <td>{{$value->due}}</td>
                  {{-- <td>
                    @if($value->status == 1)
                    <span class="label label-success">Active</span>
                    @elseif($value->status == 0)
                    <span class="label label-warning">Inactive</span>
                    @endif
                  </td> --}}
                  <td>{{ $source->dformat($value->buying_date)}}</td>
                  <td>
                    <a href="{{route('purchase.show', $value->id)}}" class="btn btn-info" title="purchase Details"><i class="fa fa-file-text"></i></a>
                    <a href="{{route('purchase.edit', $value->id)}}" class="btn btn-warning" title="Edit this purchase"><i class="fa fa-edit"></i></a>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <div class="pagination-sm no-margin pull-right">
                {{-- {{$values->links()}} --}}
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