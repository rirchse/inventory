@extends('dashboard')
@section('title', 'Edit Product')
@section('content')
<section class="content-header">
  <h1>
    Product
</h1>
<ol class="breadcrumb">
    <li><a href="{{route('product.index')}}"><i class="fa fa-dashboard"></i> Products</a></li>
    <li class="active">Edit Product</li>
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
          <h3 class="box-title">Edit Product</h3>
      </div>
      <div class="col-md-12 text-right toolbar-icon">
          <a href="{{route('product.show',$product->id)}}" class="label label-info" title="product Details"><i class="fa fa-file-text"></i></a>
          <a href="{{route('product.index')}}" title="View {{Session::get('_types')}} product" class="label label-success"><i class="fa fa-list"></i></a>
          {{-- <a href="{{route('product.delete',$product->id)}}" class="label label-danger" title="Delete this account"><i class="fa fa-trash"></i></a> --}}
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form action="{{route('product.update', $product->id)}}" method="POSt" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="box-body">
        <div class="col-md-6">
           <div class="form-group label-floating">
            <label
                for="name"
                class="control-label"
            >
                Product Name:
            </label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ $product->name }}"
                class="form-control"
            >
        </div>
        <div class="form-group label-floating">
            <label
                for="category"
                class="control-label"
            >
                Category:
            </label>
            <select name="category_id" class="form-control" >
                <option value="">Select Category</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}"{{ $product->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group label-floating">
            <label
                for="sub_cat"
                class="control-label"
            >
                Sub Category:
            </label>
            <select name="subcategory_id" class="form-control" >
                <option value="">Select SubCategory</option>
                @foreach($subcategories as $subcategory)
                <option value="{{$subcategory->id}}"  {{ $product->subcategory_id == $subcategory->id ? 'selected' : ''}}>{{$subcategory->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group label-floating">
            <label
                for="brand"
                class="control-label"
            >
                Brand:
            </label>
            <select name="brand_id" class="form-control" >
                <option value="">Select Brand</option>
                @foreach($brands as $brand)
                <option value="{{$brand->id}}"  {{ $product->brand_id == $brand->id ? 'selected' : ''}}>{{$brand->name}}</option>
                @endforeach
            </select>
        </div>
        {{-- <div class="form-group label-floating">
            <label
                for="stock"
                class="control-label"
            >
                Stock:
            </label>
            <input
                type="number"
                name="stock"
                id="stock"
                value="{{ $productstock->quantity }}"
                class="form-control"
            >
        </div>   --}}
    </div>
    <div class="col-md-6">
        {{-- <div class="form-group label-floating">
            <label
                for="mrp_price"
                class="control-label"
            >
                Unit Price:
            </label>
            <input
                type="number"
                name="unitprice"
                id="mrp_price"
                value="{{$productunit->price}}"
                class="form-control"
            >
        </div> --}}

        {{-- <div class="form-group label-floating">
            <label
                for="buying_date"
                class="control-label"
            >
                Buying Date:*
            </label>
            <input
                type="date"
                name="buying_date"
                id="buying_date"
                value="{{ old('buying_date', null) }}"
                class="form-control"
            >
        </div> --}}
        <div class="form-group label-floating">
            <label
                for="details"
                class="control-label"
            >
                Details:
            </label>
            <textarea
                name="description"
                id="details"
                class="form-control"
                rows="2"
            >{{ $product->description }}</textarea>
        </div>
        <div class="form-group label-floating">
            <b>Status:</b><br>
            <label
                for="status"
                class="control-label"
            >
                Active:
            </label>
            <input type="checkbox" name="status" id="status" value="1" {{ $product->status == '1' ? 'checked' : '' }}>

        </div>



{{--         <div class="col-md-6">
            <div class="fileinput fileinput-new text-center" data-provides="fileinput" style="width:250px;">                    
                <div>
                    <span class="btn-round btn-rose btn-file btn-small">
                        <span class="fileinput-new">Add Photo</span>
                        <input type="file" name="image">
                    </span>
                    <br />
                </div>
            </div>
        </div>
 --}}
        
        <button type="submit" class="btn btn-primary pull-right">Save</button>
    </div>
    <div class="clearfix"></div>
  </form>
</div> <!-- /.box -->
</div>
<!-- /.box -->

</div>
<!--/.col (left) -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
@endsection