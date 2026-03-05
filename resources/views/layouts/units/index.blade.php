@extends('dashboard')
@section('title', 'View All Units')
@section('content')    

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>All Units</h1>
      <ol class="breadcrumb">
        <li>
          <a href="#">
            <i class="fa fa-dashboard"></i> Dashboard
          </a>
        </li>
        {{-- <li><a href="#">Tables</a></li> --}}
        <li class="active">All Units</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List of Unit</h3>
            <div class="col-md-12 text-right toolbar-icon">
              <a href="{{route('unit.create')}}" title="Add Unit" class="label label-info"><i class="fa fa-plus"></i></a>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-hover">
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Symbol</th>
                  <th>Details</th>
                  <th>Status</th>
                  <th>Created On</th>
                  <th width="110">Action</th>
                </tr>

                @foreach($units as $unit)

                <tr>
                  <td>{{$unit->id}}</td>
                  <td>{{$unit->name}}</td>
                  <td>{{$unit->symbol}}</td>
                  <td>{{$unit->details}}</td>
                  <td>
                    @if($unit->status == "Active")
                    <span class="label label-success">Active</span>
                    @else
                    <span class="label label-warning">Inactive</span>
                    @endif
                  </td>
                  <td>{{ date('d M Y', strtotime($unit->created_at))}}</td>
                  <td>
                    <a href="{{route('unit.show',$unit->id)}}" class="label label-info" title="unit Details"><i class="fa fa-file-text"></i></a>
                    <a href="{{route('unit.edit',$unit->id)}}" class="label label-warning" title="Edit this unit"><i class="fa fa-edit"></i></a>
                    
                  </td>
                </tr>

                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <div class="pagination-sm no-margin pull-right">
                {!! $units->links() !!}
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