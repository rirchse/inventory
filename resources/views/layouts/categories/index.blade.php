@php
use \App\Http\Controllers\SourceCtrl;
$source = new SourceCtrl;
@endphp

@extends('dashboard')
@section('title', 'View All Category')
@section('content')
    

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>All Category</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        {{-- <li><a href="#">Tables</a></li> --}}
        <li class="active">All Category</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="col-xs-9"><h3 class="box-title">List of Category</h3></div>
              <div class="col-xs-3 text-right toolbar-icon">
                <a href="{{route('category.create')}}" title="Add Category" class="label label-info"><i class="fa fa-plus"></i></a>
              </div>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-hover">
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Details</th>
                  <th>Created On</th>
                  <th width="110">Action</th>
                </tr>

                @foreach($categories as $key => $category)

                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$category->name}}</td>
                  <td>
                    @if($category->status == 'Active')
                    <span class="label label-success">Active</span>
                    @else
                    <span class="label label-danger">Inactive</span>
                    @endif
                  </td>
                  <td>{{$category->details}}</td>
                  <td>{{ $source->dtformat($category->created_at) }}</td>
                  <td>
                    <a href="{{route('category.show',$category->id)}}" class="label label-info" title="category Details"><i class="fa fa-file-text"></i></a>
                    <a href="{{route('category.edit', $category->id)}}" class="label label-warning" title="Edit this category"><i class="fa fa-edit"></i></a>
                  </td>
                </tr>

                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <div class="pagination-sm no-margin pull-right">
                {!! $categories->links() !!}
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