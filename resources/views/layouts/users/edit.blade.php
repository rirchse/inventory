@extends('dashboard')
@section('title', 'Edit User Account')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>User Account</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit User Account</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              {{-- @php
                  dd($user)
              @endphp --}}
              <h3 class="box-title">Edit User Account</h3>
              {{-- <h3 class="box-title">Edit User Account <b>[{{$user_role->description}}]</b></h3> --}}
            </div>
            <div class="col-md-12 text-right toolbar-icon">
              <a href="{{route('user.show',$user->id)}}" class="label label-info" title="User Details"><i class="fa fa-file-text"></i></a>
              <a href="{{route('user.index')}}" title="View {{Session::get('_types')}} users" class="label label-success"><i class="fa fa-list"></i></a>
              {{-- <a href="{{route('user.delete',$user->id)}}" class="label label-danger" title="Delete this account"><i class="fa fa-trash"></i></a> --}}
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('user.update', $user)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="box-body">
                {{-- <div class="form-group label-floating">
                    <label
                        for="user_role"
                        class="control-label"
                    >
                        User Permission:
                    </label>
                    <select name="user_role" class="form-control">
                        <option value="">Select Permission</option>
                        <option selected value="{{$user_role->id}}">{{$user_role->name.'['.$user_role->description.']'}}</option>
                        @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name.' ['.$role->description.']'}}</option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="form-group">
                  <label
                      for="name"
                      class="control-label"
                  >
                      Name:
                  </label>
                  <input
                      type="text"
                      name="name"
                      id="name"
                      value="{{ old('name', $user->name) }}"
                      class="form-control"
                  >
                </div>
                
                <div class="form-group">
                  <label
                      for="email"
                      class="control-label"
                  >
                      Email Address:
                  </label>
                  <input
                      type="email"
                      name="email"
                      id="email"
                      value="{{ old('email', $user->email) }}"
                      class="form-control"
                  >
                </div>
                <div class="form-group">
                  <label
                      for="contact"
                      class="control-label"
                  >
                      Contact Number:
                  </label>
                  <input
                      type="text"
                      name="contact"
                      id="contact"
                      value="{{ old('contact', $user->contact) }}"
                      class="form-control"
                  >
                </div>
                <div class="form-group">
                  <label for="image">Profile Image</label>
                  <input class="form-control" type="file" id="image" name="image">
                </div>
                <div class="checkbox"><b>Status: &nbsp; </b>
                  <label><input type="checkbox" name="status" value="1" {{$user->status == 1? 'checked': ''}}> Active</label>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Save</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection