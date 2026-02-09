@extends('dashboard')
@section('title', 'Create New Account')
@section('content')

 <section class="content-header">
      <h1>Create Account</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Users</a></li>
        <li class="active">Create Account</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 style="color: #800" class="box-title">Account Details</h3>
            </div>
    <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="box-body">
            <div class="col-md-12">
                <div class="form-group label-floating">
                    <label for="">User Permission:</label>
                    <select name="user_role" class="form-control" required>
                        <option value="">Select Permission</option>
                        @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name.' ['.$role->description.']'}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group label-floating">
                    <label for="">User Name:</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
               
                <div class="form-group label-floating">
                    <label for="">Email Address:</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group label-floating">
                    <label for="">Contact No.</label>
                    <input type="number" class="form-control" maxlength="11" minlength="11" placeholder="01*********" name="contact">
                </div>
            </div>
           
        
            <div class="col-md-6">
                <div class="form-group label-floating">
                    <label for="">Password:</label>
                    <input type="password" class="form-control" name="password">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group label-floating">
                    <label for="">Confirm Password:</label>
                    <input type="password" name="password_confirmation" required class="form-control">
                </div>
            </div>

             <div class="col-md-12">

                <div class="form-group label-floating">
                    <label for="">Add Photo:</label>
                    <input type="file" name="image" class="form-control">
                </div>
            </div>

        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right">Save</button>
        </div>
        
        <div class="clearfix"></div>
      </form>
          </div> <!-- /.box -->
        </div> <!--/.col (left) -->
      </div> <!-- /.row -->
    </section> <!-- /.content -->
@endsection