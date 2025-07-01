@extends('dashboard')
@section('title', 'Add New Product')
@section('content')
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
        <form action="{{route('product.store')}}" method="POST">
            @csrf
            <div class="box-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">Product Title</label>
                        <input type="text" class="form-control" name="title" id="name" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="unit">Unit</label>
                        <select class="form-control" name="unit" id="unit" required>
                            <option value="">Select One</option>
                            <option value="SQ Feet">SQ Feet</option>
                            <option value="PCS">PCS</option>
                            <option value="Pack">Pack</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="qty">Quantity</label>
                        <input type="number" class="form-control" name="qty" id="qty" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="title">Selling Price (Per Unit)</label>
                        <input type="number" class="form-control" name="price" id="price" step="0.01" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="stock">Minimum Stock</label>
                        <input type="number" class="form-control" name="stock" id="stock" step="0.01">
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="note">Note</label>
                        <textarea class="form-control" name="note" id="note"></textarea>
                    </div>
                </div>
            </div> <!-- /.box body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Save</button>
            </div>
        </form>
    </div> <!-- /.box -->
    </div> <!--/.col (left) -->
</div> <!-- /.row -->
</section> <!-- /.content -->
@endsection

@section('scripts')
<script type="text/javascript">
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
                    $("#sub_cat").html('<option value="">Select SubCategory</option>'+sub_cat_html)
                }else{
                    $("#sub_cat").html('<option value="">No SubCategory</option>')
                }

                // console.log(obj['subcats'].count());

                // $("#sub_cat").append(you_html); //// For Append
                   //// For replace with previous one
            },
            error: function(data) { 
                 console.log('data error');
            }
        });
    }

    // getsubcats(elm);
</script>
@endsection