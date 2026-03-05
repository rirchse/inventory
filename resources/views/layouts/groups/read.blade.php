@extends('dashboard')
@section('title', 'Group Details')
@section('content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Group Details</h1>
      <ol class="breadcrumb">
        <li>
          <a href="{{route('group.index')}}"><i class="fa fa-dashboard"></i>Groups </a>
        </li>
        <li class="active">Details</li>
      </ol>
    </section>

    <!-- Main content -->
  <section class="content">
    <div class="row"><!-- left column -->
      <div class="col-md-12"><!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h4 class="box-title">Group Information</h4>
          </div>
          <div class="col-md-12 text-right toolbar-icon">
            <a href="{{route('group.index')}}" title="View" class="label label-success"><i class="fa fa-list"></i></a>
            <a href="{{route('group.edit', $group->id)}}" class="label label-warning" title="Edit this group"><i class="fa fa-edit"></i></a>
            {{-- <form action="{{ route('group.destroy', $group->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="label label-danger" style="border:none; cursor:pointer;" 
                        onclick="return confirm('Are you sure you want to delete this group?')">
                    <i class="fa fa-trash"></i>
                </button>
            </form> --}}
          </div>
          <div class="col-md-12">
            <table class="table">
                <tbody>
                  <tr>
                    <th width=150>Name:</th>
                    <td>{{$group->name}}</td>
                  </tr>
                  <tr>
                    <th>Category:</th>
                    <td>{{$group->category_id}}</td>
                  </tr>
                  <tr>
                    <th>Sub Category:</th>
                    <td>{{$group->subcategory_id}}</td>
                  </tr>
                  <tr>
                    <th>Details:</th>
                    <td>{{$group->details}}</td>
                  </tr>              
                
                   <tr>
                    <th>Status:</th>
                    <td>
                      @if($group->status == 'Active')
                      <span class="label label-success">Active</span>
                      @else
                      <span class="label label-warning">Inactive</span>
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Record Created On:</th>
                    <td>{{date('d M Y h:i:s A',strtotime($group->created_at) )}} </td>
                  </tr>
                  <tr>
                    <th>Record Updated On:</th>
                    <td>{{date('d M Y h:i:s A',strtotime($group->updated_at) )}} </td>
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
