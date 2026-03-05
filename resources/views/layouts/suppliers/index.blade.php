@php
use \App\Http\Controllers\SourceCtrl;
$source = new SourceCtrl;
@endphp

@extends('dashboard')
@section('title', 'View All Suppliers')
@section('content')
    

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>All Supplier</h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        {{-- <li><a href="#">Tables</a></li> --}}
        <li class="active">All Supplier</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="col-xs-9"><h3 class="box-title">List of Supplier</h3></div>
              <div class="col-xs-3 text-right toolbar-icon">
                <a href="{{route('supplier.create')}}" title="Add Supplier" class="label label-info"><i class="fa fa-plus"></i></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-hover">
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Contact</th>
                  <th>Busines Name</th>
                  <th>Status</th>
                  <th>Details</th>
                  <th>Created On</th>
                  <th>Updated On</th>
                  <th width="110">Action</th>
                </tr>

                @foreach($suppliers as $supplier)

                <tr>
                  <td>{{$supplier->id}}</td>
                  <td>{{$supplier->name}}</td>
                  <td>{{$supplier->contact}}</td>
                  <td>{{$supplier->business_name}}</td>
                  <td>
                    @if($supplier->status == 'Active')
                    <span class="label label-success">Active</span>
                    @else
                    <span class="label label-danger">Inactive</span>
                    @endif
                  </td>
                  <td>{{$supplier->details}}</td>
                  <td>{{ $source->dtformat($supplier->created_at) }}</td>
                  <td>{{ $source->dtformat($supplier->updated_at) }}</td>
                  <td>
                    <a href="{{route('supplier.show',$supplier->id)}}" class="label label-info" title="Supplier Details"><i class="fa fa-file-text"></i></a>
                    <a href="{{route('supplier.edit', $supplier->id)}}" class="label label-warning" title="Edit this supplier"><i class="fa fa-edit"></i></a>
                  </td>
                </tr>

                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <div class="pagination-sm no-margin pull-right">
                {!! $suppliers->links() !!}
              </div>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
@endsection