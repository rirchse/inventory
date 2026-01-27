{{-- @extends('login')
@section('title', 'User Details')
@section('content') --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Account Details</h1>
      <ol class="breadcrumb">
        <li>
          <a href="#"><i class="fa fa-dashboard"></i>...</a>
        </li>
        <li class="active">User Details</li>
      </ol>
    </section>

    <!-- Main content -->
  <section class="content">
    <div class="row"><!-- left column -->
      <div class="col-md-6"><!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h4 class="box-title">Account Information</h4>
          </div>
          <div class="col-md-12 text-right toolbar-icon">
            <a href="{{route('user.index')}}" title="" class="label label-success"><i class="fa fa-list"></i></a>
            <a href="{{route('user.edit', "")}}" class="label label-warning" title="Edit this User"><i class="fa fa-edit"></i></a>
            
          </div>
          <div class="col-md-12">
            <table class="table">
                <tbody>
                  <tr>
                    <th>User Permission:</th>
                    <td>...</td>
                  </tr>
                  <tr>
                    <th>Name:</th>
                    <td>...</td>
                  </tr>
                  
                  <tr>
                    <th>Email:</th>
                    <td>...</td>
                  </tr>
                  <tr>
                    <th>Contact:</th>
                    <td>...</td>
                  </tr>              
                
                   <tr>
                    <th>Status:</th>
                    <td>
                    </td>
                  </tr>
                  <tr>
                    <th>Record Created On:</th>
                    <td> </td>
                  </tr>
                  <tr>
                    <th>Updated On:</th>
                    <td> </td>
                  </tr>
                  <tr>
                    <th>Photo:</th>
                    <td>
                    </td>
                  </tr>
              </tbody>
            </table>
          </div>
          <div class="clearfix"></div>
        </div>
      </div><!-- /.box -->
      <button onclick="getUser()">get user info</button>
    </div><!--/.col (left) -->
  </section><!-- /.content -->
   @include('partials.scripts')
{{-- @endsection --}}
@section('scripts')
<script>
  function getUser()
  {
    $.ajax({
      url: "/api/me",
      method: "GET",
      headers: { Authorization: "Bearer " + localStorage.getItem("access_token") },
      success: function(res) {
        console.log("User:", res);
      }
    });

    console.log(localStorage.getItem("access_token"));
  }
</script>

  
</body>
</html>
