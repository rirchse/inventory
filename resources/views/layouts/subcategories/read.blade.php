@extends('dashboard')
@section('title', 'Subcategory Details')
@section('content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Subcategory Details</h1>
      <ol class="breadcrumb">
        <li>
          <a href="#"><i class="fa fa-dashboard"></i>Subcategoris </a>
        </li>
        <li class="active">Details</li>
      </ol>
    </section>

    <!-- Main content -->
  <section class="content">
    <div class="row"><!-- left column -->
      <div class="col-md-8"><!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h4 class="box-title">Subcategory Information</h4>
          </div>
          <div class="col-md-12 text-right toolbar-icon">
            <a href="{{route('subcategory.index')}}" title="View" class="label label-success"><i class="fa fa-list"></i></a>
            <a href="{{route('subcategory.edit', $subcategory->id)}}" class="label label-warning" title="Edit this subcategory"><i class="fa fa-edit"></i></a>
          </div>
          <div class="col-md-12">
            <table class="table">
                <tbody>
                  <tr>
                    <th width=150>Name:</th>
                    <td>{{$subcategory->name}}</td>
                  </tr>
                  <tr>
                    <th>Category:</th>
                    <td>{{$subcategory->category_id}}</td>
                  </tr>
                  <tr>
                    <th>Details:</th>
                    <td>{{$subcategory->details}}</td>
                  </tr>              
                
                   <tr>
                    <th>Status:</th>
                    <td>
                      @if($subcategory->status == 'Active')
                      <span class="label label-success">Active</span>
                      @else
                      <span class="label label-warning">Inactive</span>
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Record Created On:</th>
                    <td>{{date('d M Y h:i:s A',strtotime($subcategory->created_at) )}} </td>
                  </tr>
                  <tr>
                    <th>Record Updated On:</th>
                    <td>{{date('d M Y h:i:s A',strtotime($subcategory->updated_at) )}} </td>
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
