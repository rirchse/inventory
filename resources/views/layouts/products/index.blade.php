@php
use \App\Http\Controllers\SourceCtrl;
$source = new SourceCtrl;
@endphp

@extends('dashboard')
@section('title', 'View All Product')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>All Products</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active">All Products</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">List of Product</h3>
              <div class="box-tools">
                <a href="{{route('product.create')}}" class="btn btn-sm btn-info">
                  <i class="fa fa-plus"></i> Add
                </a>
                {{-- <div class="input-group input-group-sm" style="float:right; width: 150px;margin-left:15px">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div> --}}
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-hover">
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Sub Category</th>
                  <th>Brand</th>
                  <th>SKU</th>                  
                  <th>Barcode</th>
                  <th>Units</th>
                  <th>Price</th>
                  <th>Stock</th>
                  <th>Status</th>
                  <th width="110">Action</th>
                </tr>
                @foreach($products as $product)
                <tr>
                  <td>{{$product->id}}</td>
                  <td>{{$product->name}}</td>
                  <td>{{$product->category?$product->category->name :''}}</td>
                  <td>{{$product->subcategory ? $product->subcategory->name : ''}}</td>
                  <td>{{$product->brand ? $product->brand->name : ''}}</td>
                  <td>{{$product->sku}}</td>
                  <td>{{$product->barcode}}</td>
                  <td>
                    @foreach($product->productUnit as $unit)
                    {{$unit->unit_name}} <br>
                    @endforeach
                  </td>
                  <td>
                    @foreach($product->productUnit as $unit)
                    {{$unit->price}} <br>
                    @endforeach
                  </td>
                  <td>
                    @foreach($product->stocks as $stock)
                    {{$stock->quantity}} <br>
                    @endforeach
                  </td>
                  <td>
                    @if($product->status == 1)
                    <span class="label label-success">Active</span>
                    @elseif($product->status == 0)
                    <span class="label label-warning">Inactive</span>
                    @endif
                  </td>
                  <td>
                    <a href="{{route('product.show',$product->id)}}" class="btn btn-info" title="product Details"><i class="fa fa-file-text"></i></a>
                    <a href="{{route('product.edit',$product->id)}}" class="btn btn-warning" title="Edit this product"><i class="fa fa-edit"></i></a>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <div class="pagination-sm no-margin pull-right">
                {{$products->links()}}
              </div>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
    @endsection
{{-- @section('scripts')
  <script>
    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>
@endsection --}}