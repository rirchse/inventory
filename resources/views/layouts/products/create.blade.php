@extends('dashboard')
@section('title', 'Add New Product')
@section('content')
<style>
  input[name="is_base_unit"]{
    width:20px;
    height:20px;
  }
  .close{
    color:red;
    font-size: 25px
  }
  @media only screen and (max-width: 767px){
    .row > .col-xs-6:nth-child(odd) {
        padding-left: 7.5px;
    }
    .row > .col-xs-6:nth-child(even) {
        padding-right: 7.5px;
    }
  }
</style>
<section class="content-header">
  <h1>Add a Product</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Products</a></li>
    <li class="active">Add Product</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row"> <!-- left column -->
    <div class="col-md-8"> <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
            <h3 style="color: #800" class="box-title">Product Details</h3>
        </div>
        <div class="box-body">
          <form action="{{ route('product.store') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-12">
                <!-- Product Name -->
                <div class="form-group">
                  <label for="name">Product Name</label>
                  <input type="text" name="name" id="name" class="form-control" required>
                </div>
              </div>
              <div class="col-md-6 col-xs-6">
                <!-- SKU -->
                <div class="form-group">
                  <label for="sku">SKU (optional)</label>
                  <input type="text" name="sku" id="sku" class="form-control">
                </div>
              </div>
              <div class="col-md-6 col-xs-6">
                <div class="form-group">
                  <label for="barcode">Barcode Number</label>
                  <input type="text" name="barcode" id="barcode" class="form-control">
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
                        <option value="">Select One</option>
                        @foreach($units as $unit)
                        <option value="{{$unit->symbol}}">{{$unit->name}}</option>
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
                    <div class="form-group">
                      <button type="button" class="btn btn-info btn-sm btn-block" onclick="addUnit()">
                        <i class="fa fa-plus"></i> 
                        Add Another Unit</button>
                    </div>
                  </div>
                </div>
              </div> <!-- end single product unit wrapping col-12 -->
              <div class="col-xs-12">
                <div class="form-group">
                  <label for="description">Description (optional)</label>
                  <textarea name="description" id="description" class="form-control" rows="2"></textarea>
                </div>
              </div>
              <div class="col-xs-12">
                <div class="checkbox">
                  <strong>Product Status: </strong>
                  <label>
                    <input type="checkbox" name="is_active" value="1" checked>
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
    </div> <!--/.col (left) -->
</div> <!-- /.row -->
</section> <!-- /.content -->
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
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="removeUnit(this)">&times;</button>'+
                    '<hr>'+
                  '</div>'+
                '</div>';
  
  
  
  
  
  
  
  
  
  // '<div class="row"'+
  //           '<div class="col-xs-6 col-md-4">'+
  //             '<div class="form-group">'+
  //               '<label for="unit">Unit</label>'+
  //               '<select name="unit[]" id="unit" class="form-control" step="0.01" required>'+
  //               units+
  //               '</select>'+
  //               '</div>'+
  //             '</div>'+
  //             '<div class="col-xs-6 col-md-4">'+
  //               '<div class="form-group">'+
  //                 '<label for="price">Unit Price</label>'+
  //                 '<input type="number" name="price[]" class="form-control" step="0.01">'+
  //               '</div>'+
  //             '</div>'+

            
  //             '<div class="col-xs-6 col-md-4">'+
  //               '<div class="form-group">'+
  //                 '<label for="quantity">Stock Quantity</label>'+
  //                 '<input type="number" name="quantity[]" class="form-control">'+
  //               '</div>'+
  //             '</div>'+
            
  //             '<div class="col-xs-6 col-md-4">'+
  //               '<div class="form-group">'+
  //                 '<label for="alert_quantity">Stock Alert</label>'+
  //                 '<input type="number" name="alert_quantity[]" class="form-control">'+
  //               '</div>'+
  //             '</div>'+
            
  //             '<div class="col-xs-6 col-md-4">'+
  //               '<div class="form-group">'+
  //                 '<label for="convert_base_unit">Convert to Base Unit</label>'+
  //                 '<input type="number" name="convert_base_unit[]" class="form-control" placeholder="1 pack = 12 pcs">'+
  //               '</div>'+
  //             '</div>'+
            
  //             '<div class="col-xs-6 col-md-4">'+
  //               '<div class="form-group">'+
  //                 '<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="removeUnit(this)">&times;</button>'+
  //                 '<label for="">Is this Base Unit?</label>'+
  //                 '<br>'+
  //                 '<label for="is_base_unit">'+
  //                   '<input type="radio" name="is_base_unit[]" check="0" onclick="unCheck(this)">'+ 
  //                      ' Yes'+
  //                 '</label>'+
  //               '</div>'+
  //             '</div>'+
  //           '</div>';
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