@php
use \App\Http\Controllers\SourceCtrl;
$source = new SourceCtrl;
@endphp

@extends('dashboard')
@section('title', 'View All Group')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>All Group</h1>
      <ol class="breadcrumb">
        <li>
          <a href="#">
            <i class="fa fa-dashboard"></i> Dashboard
          </a>
        </li>
        <li class="active">All Group</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List of Group</h3>
              <div class="col-md-12 text-right toolbar-icon">
                <a href="{{route('group.create')}}" title="Add group" class="label label-info"><i class="fa fa-plus"></i></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              @forelse($groups as $group)
                  {{-- Check if this is the very first loop to show the table header --}}
                  @if ($loop->first)
                  <table id="example1" class="table table-bordered table-hover">
                      <thead>
                          <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Status</th>
                            <th>Created On</th>
                            <th width="110">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                  @endif

                      <tr>
                          <td>{{$group->id}}</td>
                          <td>{{$group->name}}</td>
                          <td>{{$group->category_id}}</td>
                          <td>{{$group->subcategory_id}}</td>
                          <td>
                              @if($group->status == 'Active')
                                  <span class="label label-success">Active</span>
                              @else
                                  <span class="label label-warning">Inactive</span>
                              @endif
                          </td>
                          <td>{{ $source->dtformat($group->created_at) }}</td>
                          <td>
                              <a href="{{route('group.show', $group->id)}}" class="label label-info" title="Details">
                                  <i class="fa fa-file-text-o"></i>
                              </a>
                              <a href="{{route('group.edit', $group->id)}}" class="label label-warning" title="Edit">
                                  <i class="fa fa-edit"></i>
                              </a>
                              <form action="{{ route('group.destroy', $group->id) }}" method="POST" style="display:inline;">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="label label-danger" style="border:none; cursor:pointer;" 
                                          onclick="return confirm('Are you sure?')">
                                      <i class="fa fa-trash"></i>
                                  </button>
                              </form>
                          </td>
                      </tr>

                  {{-- Check if this is the last loop to close the table tags --}}
                  @if ($loop->last)
                      </tbody>
                  </table>
                  @endif

              @empty
                  <div class="col-md-12">
                    <h4>No Groups Found!</h4>
                      <p>It looks like you haven't created any groups yet.</p>
                      <a href="{{ route('group.create') }}" class="btn btn-primary">
                          <i class="fa fa-plus"></i> Create Your First Group
                      </a>
                    </div>
              @endforelse
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <div class="pagination-sm no-margin pull-right">
                {!! $groups->links() !!}
              </div>
            </div>
          </div> <!-- /.box -->
        </div>
      </div>
    </section> <!-- /.content -->
@endsection