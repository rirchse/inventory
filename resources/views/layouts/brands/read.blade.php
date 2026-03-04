@extends('dashboard')
@section('title', 'Brand Details')
@section('content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Brand Details</h1>
      <ol class="breadcrumb">
        <li>
          <a href="#"><i class="fa fa-dashboard"></i>Categoris </a>
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
            <h4 class="box-title">Brand Information</h4>
          </div>
          <div class="col-md-12 text-right toolbar-icon">
            <a href="{{route('brand.index')}}" title="View" class="label label-success"><i class="fa fa-list"></i></a>
            <a href="{{route('brand.edit', $brand->id)}}" class="label label-warning" title="Edit this brand"><i class="fa fa-edit"></i></a>
          </div>
          <div class="col-md-12">
            <table class="table">
                <tbody>
                  <tr>
                    <th width=150>Name:</th>
                    <td>{{$brand->name}}</td>
                  </tr>
                  <tr>
                    <th>Category:</th>
                    <td>{{$brand->category_id}}</td>
                  </tr>
                  <tr>
                    <th>Details:</th>
                    <td>{{$brand->details}}</td>
                  </tr>              
                
                   <tr>
                    <th>Status:</th>
                    <td>
                      @if($brand->status == 'Active')
                      <span class="label label-success">Active</span>
                      @else
                      <span class="label label-warning">Inactive</span>
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Record Created On:</th>
                    <td>{{date('d M Y h:i:s A',strtotime($brand->created_at) )}} </td>
                  </tr>
                  <tr>
                    <th>Record Updated On:</th>
                    <td>{{date('d M Y h:i:s A',strtotime($brand->updated_at) )}} </td>
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
