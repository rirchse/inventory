@extends('dashboard')
@section('title', 'Edit Product')
@section('content')
<section class="content-header">
  <h1>
    Product
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Edit Product</li>
</ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-10">
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
      </form>
      <div class="box-body">
        <div class="col-md-6">
           <div class="form-group label-floating">
            <label
                for="name"
                class="control-label"
            >
                Product Name: *
            </label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ $product->title }}"
                class="form-control"
            >
        </div>
        <div class="form-group label-floating">
            <label
                for="category"
                class="control-label"
            >
                Category: *
            </label>
            <select name="category" class="form-control" >
                <option value="">Select Category</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}"{{ $product->cat_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
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
            <select name="sub_cat" class="form-control" >
                <option value="">Select SubCategory</option>
                @foreach($subcategories as $subcategory)
                <option value="{{$subcategory->id}}"  {{ $product->sub_cat_id == $subcategory->id ? 'selected' : ''}}>{{$subcategory->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group label-floating">
            <label
                for="vendor"
                class="control-label"
            >
                Vendor:
            </label>
            <select name="vendor" class="form-control" >
                <option value="">Select Vendor</option>
                @foreach($vendors as $vendor)
                <option value="{{$vendor->id}}"  {{ $product->vendor == $vendor->id ? 'selected' : ''}}>{{$vendor->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group label-floating">
            <label
                for="brand"
                class="control-label"
            >
                Brand: *
            </label>
            <input list="brand" name="brand" class="form-control" value="{{$product->brand}}">
            <datalist id="brand">
                <option value="Non Brand">
                <option value="waltone">
                <option value="sony">
                <option value="RFL">                
            </datalist>            
        </div>
        <div class="form-group label-floating">
            <label
                for="serial_no"
                class="control-label"
            >
                Serial Number:
            </label>
            <input
                type="text"
                name="serial_no"
                id="serial_no"
                value="{{ old('serial_no', null) }}"
                class="form-control"
            >
        </div>
        <div class="form-group label-floating">
            <label
                for="stock"
                class="control-label"
            >
                Stock: *
            </label>
            <input
                type="number"
                name="stock"
                id="stock"
                value="{{ old('stock', null) }}"
                class="form-control"
            >
        </div>  
    </div>
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label
                for="mrp_price"
                class="control-label"
            >
                MRP Price: *
            </label>
            <input
                type="number"
                name="mrp_price"
                id="mrp_price"
                value="{{ old('mrp_price', null) }}"
                class="form-control"
            >
        </div>
        <div class="form-group label-floating">
            <label
                for="credit_price"
                class="control-label"
            >
                Credit Price:
            </label>
            <input
                type="number"
                name="credit_price"
                id="credit_price"
                value="{{ old('credit_price', null) }}"
                class="form-control"
            >
        </div>
        <div class="form-group label-floating">
            <label
                for="cash_price"
                class="control-label"
            >
                Cash price:
            </label>
            <input
                type="number"
                name="cash_price"
                id="cash_price"
                value="{{ old('cash_price', null) }}"
                class="form-control"
            >
        </div>      
        <div class="form-group label-floating">
            <label
                for="buying_price"
                class="control-label"
            >
                Buying Price:
            </label>
            <input
                type="number"
                name="buying_price"
                id="buying_price"
                value="{{ old('buying_price', null) }}"
                class="form-control"
            >
        </div>

        <div class="form-group label-floating">
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
        </div>
        <div class="form-group label-floating">
            <label
                for="details"
                class="control-label"
            >
                Details:
            </label>
            <textarea
                name="details"
                id="details"
                class="form-control"
                rows="2"
            >{{ old('details', null) }}</textarea>
        </div>
        <div class="form-group label-floating">
            <b>Status:</b><br>
            <label
                for="status"
                class="control-label"
            >
                Active:
            </label>
            <input type="checkbox" value="1">
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