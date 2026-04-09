@php
use \App\Http\Controllers\SourceCtrl;
$source = new SourceCtrl;
@endphp

@extends('dashboard')
@section('title', 'View All SMS')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>All SMS</h1>
      <ol class="breadcrumb">
        <li>
          <a href="#">
            <i class="fa fa-dashboard"></i> Dashboard
          </a>
        </li>
        <li class="active">All SMS</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List of SMS</h3>
              <div class="col-md-12 text-right toolbar-icon">
                {{-- <a href="{{route('group.create')}}" title="Add group" class="label label-info"><i class="fa fa-plus"></i></a> --}}
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-hover">
                      <thead>
                          <tr>
                            <th>Id</th>
                            <th>Customer Name</th>
                            <th>Contact</th>
                            <th>Sms Text</th>
                            <th>Sent At</th>
                            <th width="110">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                    @foreach($smses as $key => $sms)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$sms->customer?$sms->customer->name:''}}</td>
                        <td>{{$sms->customer?$sms->customer->contact:''}}</td>
                        <td>{{$sms->sms}}</td>
                        <td>{{ $source->dtformat($sms->created_at) }}</td>
                        <td>
                            {{-- <a href="{{route('sms.show', $sms->id)}}" class="label label-info" title="Details">
                                <i class="fa fa-file-text-o"></i>
                            </a>
                            <a href="{{route('sms.edit', $sms->id)}}" class="label label-warning" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a> --}}
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <div class="pagination-sm no-margin pull-right">
                {!! $smses->links() !!}
              </div>
            </div>
          </div> <!-- /.box -->
        </div>
      </div>
    </section> <!-- /.content -->
@endsection