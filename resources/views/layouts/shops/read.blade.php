@php
use \App\Http\Controllers\SourceCtrl;
$source = new SourceCtrl;
@endphp

@extends('dashboard')
@section('title', 'Shop Details')
@section('content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Account Details</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Shop Details</li>
      </ol>
    </section>

    <!-- Main content -->
  <section class="content">
    <div class="row"><!-- left column -->
      <div class="col-md-6"><!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h4 class="box-title">Shop Information</h4>
          </div>
          <div class="col-md-12 text-right toolbar-icon">
          </div>
          @if($shop)
          <div class="col-md-12">
            <table class="table">
                <tbody>
                  <tr>
                    <th>Logo:</th>
                    <td>
                      @if($shop->image)
                      <a href="{{$shop->image}}" target="_blank" title="View large image">
                        <img src="{{$shop->image}}" width=100 style="border: 5px solid #eee">
                      </a>
                      @else
                      No image
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Name:</th>
                    <td>{{$shop->name}}</td>
                  </tr>
                  <tr>
                    <th>Mobile:</th>
                    <td>{{$shop->phone}}</td>
                  </tr>
                  <tr>
                    <th>Owner:</th>
                    <td>{{$shop->owner}}</td>
                  </tr>
                  <tr>
                    <th>Contact Person:</th>
                    <td>{{$shop->contact_person}}</td>
                  </tr>
                  <tr>
                    <th>Email:</th>
                    <td>{{$shop->email}}</td>
                  </tr>
                  <tr>
                    <th>Contact:</th>
                    <td>{{$shop->contact}}</td>
                  </tr>
                  <tr>
                    <th>Website:</th>
                    <td>{{$shop->domain}}</td>
                  </tr>
                  <tr>
                    <th>Address:</th>
                    <td>{{$shop->address}}</td>
                  </tr>
                  <tr>
                    <th>Status:</th>
                    <td>
                      @if($shop->status == 'Active')
                      <span class="label label-success">Active</span>
                      @else
                      <span class="label label-danger">Disabled</span>
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Record Created On:</th>
                    <td>{{ $source->dtformat($shop->created_at) }} </td>
                  </tr>
                  <tr>
                    <th>Updated On:</th>
                    <td>{{  $source->dtformat($shop->updated_at) }} </td>
                  </tr>
              </tbody>
            </table>
          </div>
          @else
          <p class="text-center">No shop available</p>
          @endif
          <div class="clearfix"></div>
        </div>
      </div><!-- /.box -->
    </div><!--/.col (left) -->
  </section><!-- /.content -->
   
@endsection
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
  }
</script>
