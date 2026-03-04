@extends('dashboard')
@section('title', 'Edit Product')
@section('content')
<style>
  /* input[name="is_base_unit"]{
    width:20px;
    height:20px;
  } */
  .close-unit {
      color: red;
      font-size: 1em;
      opacity: .6;
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      top: 12px;
  }
  select.form-control {
      text-transform: capitalize;
  }
  @media only screen and (max-width: 767px){
    .row > .col-xs-6:nth-child(odd) {
        padding-left: 7.5px;
    }
    .row > .col-xs-6:nth-child(even) {
        padding-right: 7.5px;
    }
    .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9{
      position: inherit;
    }
  }
</style>
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
                <div class="col-xs-8">
                    <h3 class="box-title">Edit Product</h3>
                </div>
                <div class="col-xs-4 text-right toolbar-icon">
                    <a href="{{route('product.show',$product->id)}}" class="label label-info" title="product Details"><i class="fa fa-file-text"></i></a>
                    <a href="{{route('product.index')}}" title="View {{Session::get('_types')}} product" class="label label-success"><i class="fa fa-list"></i></a>
                    {{-- <a href="{{route('product.delete',$product->id)}}" class="label label-danger" title="Delete this account"><i class="fa fa-trash"></i></a> --}}
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="{{ route('product.update', $product->id) }}" method="POST">
                    @csrf
                    <div class="row">
                    <div class="col-md-12">
                        <!-- Product Name -->
                        <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" id="name" value="{{$product->name}}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="form-group">
                        <label for="cat">Category</label>
                        <select id="cat" name="category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $cat)
                            <option value="{{$cat->id}}" {{$product->category_id == $cat->id ? 'selected' : ''}}>{{$cat->name}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="form-group">
                        <label>Sub Subcategory</label>
                        <select class="form-control" name="subcategory_id">
                            <option value="">Select Subcategory</option>
                            @foreach($subcategories as $subcat)
                            <option value="{{$subcat->id}}" {{$product->subcategory_id == $subcat->id ? 'selected' : ''}}>{{$subcat->name}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="form-group">
                        <label>Brand:</label>
                        <select class="form-control" name="brand_id">
                            <option value="">Select Brand</option>
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}" {{$product->brand_id == $brand->id ? 'selected' : ''}}>{{$brand->name}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <!-- SKU -->
                        <div class="form-group">
                        <label for="sku">SKU (optional)</label>
                        <input type="text" name="sku" id="sku" value="{{$product->sku}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                        <label for="barcode">Barcode Number</label>
                        <input type="text" name="barcode" id="barcode" value="{{$product->barcode}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row" id="firstUnit">
                        <div class="col-xs-12">
                            <hr>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                            <label for="unit">Unit</label>
                            <select name="unit[]" id="unit" class="form-control" step="0.01" required>
                                <option value="">Select Unit</option>
                                @foreach($units as $unit)
                                <option value="{{$unit->symbol}}" {{$product->unit == $unit->symbol ? 'selected' : ''}}>{{$unit->name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                            <label for="price">Unit Price</label>
                            <input type="number" id="price" name="price[]" class="form-control" step="0.01">
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                            <label for="quantity">Stock Quantity</label>
                            <input type="number" id="quantity" name="quantity[]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                            <label for="alert_quantity">Stock Alert</label>
                            <input type="number" id="alert_quantity" name="alert_quantity[]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                            <label for="convert_base_unit">Convert to Base Unit</label>
                            <input type="number" id="convert_base_unit" name="convert_base_unit[]" class="form-control" placeholder="1 pack = 12 pcs">
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="radio">
                            <strong>Is this Base Unit?</strong><br>
                            <label>
                                <input type="radio" name="is_base_unit[]" check="0" onclick="unCheck(this)">
                                Yes
                            </label>
                            </div>
                        </div>
                        </div> <!-- end single product unit row -->
                        <div class="row">
                        <div class="col-xs-12 col-md-5">
                            <button type="button" class="btn btn-info btn-sm btn-block" onclick="addUnit()">
                            <i class="fa fa-plus"></i> 
                            Add Another Unit
                            </button>
                        </div>
                        <div class="col-xs-12">
                            <hr>
                        </div>
                        </div>
                    </div> <!-- end single product unit wrapping col-12 -->

                    {{-- {{dd($product)}} --}}
                    <div class="col-xs-12">
                        <div class="form-group">
                        <label for="description">Description (optional)</label>
                        <textarea name="description" id="description" class="form-control" rows="2">{{$product->description}}</textarea>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="checkbox">
                        <strong>Product Status: </strong>
                        <label>
                            <input type="checkbox" name="is_active" value="{{$product->status}}" {{$product->status == "Active" ? 'checked' : ''}} checked>
                            Active
                        </label>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-lg pull-right"> <i class="fa fa-save"> </i> Save</button>
                    </div>
                    </div><!-- parent row end -->
                </form>
            </div>
            

        </div> <!-- /.box -->
    </div>
    <!-- /.box -->

  </div>
<!-- /.row -->
</section>
<!-- /.content -->
@endsection
@section('scripts')
<script type="text/javascript">
let units = '';
function addUnit()
{
  const firstUnit = document.getElementById('firstUnit');
  let unit = document.createElement('div');
  unit.setAttribute('class', 'col-xs-12');
  unit.innerHTML = '<div class="row">'+
                  '<div class="col-xs-12">'+
                    '<hr>'+
                  '</div>'+
                  '<div class="col-md-4 col-xs-6">'+
                    '<div class="form-group">'+
                      '<label>Unit</label>'+
                      '<select name="unit[]" class="form-control" step="0.01" required>'+
                        units+
                      '</select>'+
                    '</div>'+
                  '</div>'+
                  '<div class="col-md-4 col-xs-6">'+
                    '<div class="form-group">'+
                      '<label>Unit Price</label>'+
                      '<input type="number" name="price[]" class="form-control" step="0.01">'+
                    '</div>'+
                  '</div>'+
                  '<div class="col-md-4 col-xs-6">'+
                    '<div class="form-group">'+
                      '<label>Stock Quantity</label>'+
                      '<input type="number" name="quantity[]" class="form-control">'+
                    '</div>'+
                  '</div>'+
                  '<div class="col-md-4 col-xs-6">'+
                    '<div class="form-group">'+
                      '<label>Stock Alert</label>'+
                      '<input type="number" name="alert_quantity[]" class="form-control">'+
                    '</div>'+
                  '</div>'+
                  '<div class="col-md-4 col-xs-6">'+
                    '<div class="form-group">'+
                      '<label>Convert to Base Unit</label>'+
                      '<input type="number" name="convert_base_unit[]" class="form-control" placeholder="1 pack = 12 pcs">'+
                    '</div>'+
                  '</div>'+
                  '<div class="col-md-4 col-xs-6">'+
                    '<div class="radio">'+
                      '<strong>Is this Base Unit?</strong><br>'+
                      '<label>'+
                        '<input type="radio" name="is_base_unit[]" check="0" onclick="unCheck(this)">'+
                        'Yes'+
                      '</label>'+
                    '</div>'+
                  '</div>'+
                  '<div class="col-xs-12">'+
                    '<button type="button" class="close close-unit" data-dismiss="alert" aria-hidden="true" onclick="removeUnit(this)"><i class="fa fa-times-circle" aria-hidden="true"></i> Remove this Unit</button>'+
                    '<hr>'+
                  '</div>'+
                '</div>';
  firstUnit.appendChild(unit);
}

function unCheck(e)
{
  if(e.getAttribute('check') == 0)
  {
    e.checked = true;
    e.setAttribute('check', 1);
  }
  else
  {
    e.checked = false;
    e.setAttribute('check', 0)
  }

  const isBaseUnit = document.querySelectorAll('input[name="is_base_unit"]');
    isBaseUnit.forEach((b) => {
      if(b.checked == true)
      {
        b.setAttribute('check', 1);
      }
      else
      {
        b.setAttribute('check', 0);
      }
    });
  

}

function removeUnit(e)
{
  e.parentNode.parentNode.parentNode.remove();
}
    function getsubcats(elm){

        var catid = elm.options[elm.options.selectedIndex].value;

        $.ajax({
            type: 'GET', //THIS NEEDS TO BE GET
            url: '/get_sub_cats/'+catid,
            success: function (data) {

              var obj = JSON.parse(JSON.stringify(data));
              var sub_cat_html = "";

              $.each(obj['subcats'], function (key, val) {
                sub_cat_html += "<option value="+val.id+">"+val.name+"</option>";
              });

              if(sub_cat_html != ""){
                $("#sub_cat").html('<option value="">Select One</option>'+sub_cat_html)
              }else{
                $("#sub_cat").html('<option value="">No One</option>')
              }
            },
            error: function(data) { 
                 console.log('data error');
            }
        });
    }

    $(document).ready(function(){
      $.ajax({
        type: 'GET',
        url: '{{route("unit.get-unit")}}',
        success: function(data){
          data.units.forEach((u) => {
            units += '<option value="'+u.symbol+'">'+u.name+'</option>';
          });
        },
        error: function(data){
          console.error(data);
        }
      });
    });
</script>
@endsection