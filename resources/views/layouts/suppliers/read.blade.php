@extends('dashboard')
@section('title', 'Supplier Details')
@section('content')
 <section class="content-header">
      <h1>Supplier Details</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Suppliers</a></li>
        <li class="active">Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row"> <!-- left column -->
        <div class="col-md-12"> <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-xs-9">
                        <h3 class="box-title">Supplier Information</h3>
                    </div>
                    <div class="col-xs-3 text-right">
                        <a href="{{route('supplier.index')}}" title="View suppliers" class="label label-success"><i class="fa fa-list"></i></a>
                        <a href="{{route('supplier.edit',$supplier->id)}}" class="label label-warning" title="Edit this unit"><i class="fa fa-edit"></i></a>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <table class="table">
                <tbody>
                  <tr>
                    <th>Id:</th>
                    <td>{{$supplier->id}}</td>
                  </tr>
                  <tr>
                    <th>Name:</th>
                    <td>{{$supplier->name}}</td>
                  </tr>
                  <tr>
                    <th>Contact:</th>
                    <td>{{$supplier->contact}}</td>
                  </tr>
                  <tr>
                    <th>Email:</th>
                    <td>{{$supplier->email}}</td>
                  </tr>
                  <tr>
                    <th>Address:</th>
                    <td>{{$supplier->address}}</td>
                  </tr>
                  <tr>
                    <th>Business Name:</th>
                    <td>{{$supplier->business_name}}</td>
                  </tr>
                  <tr>
                    <th>Details:</th>
                    <td>{{$supplier->details}}</td>
                  </tr> 
                   <tr>
                    <th>Status:</th>
                    <td>
                      @if($supplier->status == 'Active')
                      <span class="label label-success">Active</span>
                      @elseif($supplier->status == 'Inactive')
                      <span class="label label-warning">Inactive</span>
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Record Created On:</th>
                    <td>{{date('d M Y h:i:s A',strtotime($supplier->created_at) )}} </td>
                  </tr>
                  <tr>
                    <th>Record Updated On:</th>
                    <td>{{date('d M Y h:i:s A',strtotime($supplier->updated_at) )}} </td>
                  </tr>
              </tbody>
            </table>
          </div> <!-- /.box -->
        </div> <!--/.col (left) -->
      </div> <!-- /.row -->
    </section> <!-- /.content -->
@endsection