@extends('dashboard')
@section('title', 'Place An Order')
@section('content')
<section class="content-header">
  <h1>Place An Order</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Orders</a></li>
    <li class="active">Place An Order</li>
</ol>
</section>
<style>

    @media only screen and (max-width: 767px){
        .order-wrap .row .col-xs-6:nth-child(even) {
            padding-left: 7.5px;
        }
        .order-wrap .row .col-xs-6:nth-child(odd) {
            padding-right: 7.5px;
        }
        .order-wrap .row .col-xs-3 {
            padding-left: 0;
            padding-right: 0;
        }
        .order-wrap hr {
            margin-top: 12px;
            margin-bottom: 12px;
        }
        .order-wrap .form-group {
            margin-bottom: 8px;
        }
        .review-order .col-xs-4 .form-control {
            padding: 3px 8px !important;
            line-height: 1.1em !important;
            height: auto;
            margin: 3px 0;
            text-align: right;
        }
        .review-order hr.m-0{
            margin: 1px 0;
        }
        .m-0{ margin: 0; }
        .mt-0{
            margin-top: 0;
        }
        .ul-status li {
            display: inline-block;
            padding-right: 20px;
            margin: 3px;
        }
        .ul-status {
            padding: 0;
            margin: 0;
        }
    }

    #alertConfirm{
      position: fixed; background: rgba(0,0,0,0.5); top:0; left:0; right: 0; bottom:0; z-index: 99999; display: none;
    }
    #alertForm{
      width: 400px;
      background: #fff;
      margin:10% auto;
      padding: 15px;
    }

    .loading{
      display: none;
      position: fixed; top:0; left:0;right: 0;bottom: 0; z-index: 99999;
      text-align: center; background: rgba(0,0,0,0.1); padding:15%;
    }
    .loading img{
      max-width: 80px;
    }
</style>
<!-- Main content -->
<section class="content">
  <div class="row"> <!-- left column -->
    <div class="col-md-12"> <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
            <h3 style="color: #800" class="box-title">Order Information</h3>
        </div>
        <div class="order-wrap box-body">
          <form id="salesForm" action="">
            @csrf
            <div class="row">
              <div class="col-xs-6 col-sm-4">
                  <div class="form-group">
                      <label for="mobile">Mobile (*):</label>
                      <input class="form-control" type="text" name="mobile" id="mobile" required onkeyup="getCustomer(this)">
                  </div>
              </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group">
                        <label for="customer_name">Customer Name (*):</label>
                        <input class="form-control" type="text" name="customer_name" id="name" required >
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group">
                        <label for="address">Address (*):</label>
                        <input type="text" class="form-control" name="address" id="address" required>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-4">
                    <div class="form-group">
                        <label for="email">Email (Optional):</label>
                        <input class="form-control" type="email" name="email" id="email">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-4">
                    <div class="form-group">
                        <label for="sales_date">Sales Date:</label>
                        <input class="form-control" type="date" name="sales_date" id="sales_date" required>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-4">
                    <div class="form-group">
                        <label for="order_no">Order No (Optional):</label>
                        <input class="form-control" type="text" name="order_no">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-xs-12">
                    <hr>
                </div>
            </div>
            <!-- product item start -->
            <div class="row" id="item-row">
              <div class="col-xs-12 no-padding">
                <div class="col-xs-12 col-md-4">
                    <div class="form-group">
                        <label for="item[]">Product Name:</label>
                        <input type="text" name="item[]" class="form-control" required onkeyup="getItem(this)" id="item" onchange="getUnits(this)" autofocus list="items" data-id="" autocomplete="off" oninput="this.removeAttribute('title')">
                    </div>
                </div>
                <div class="col-xs-4 col-md-2">
                    <div class="form-group">
                        <label for="unit[]">Unit:</label>
                        <select name="unit[]" class="form-control" onchange="getUnitPrice(this); calcSubTotal()">
                          <option value="">Select One</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-4 col-md-2">
                    <div class="form-group">
                        <label for="price[]">Unit Price:</label>
                        <input name="price[]" type="text" class="form-control" onkeyup="calcSubTotal()">
                    </div>
                </div>
                <div class="col-xs-3 col-md-2">
                    <div class="form-group">
                        <label for="qty[]">Qty:</label>
                        <input name="qty[]" type="number" class="form-control"  min="1" value=0 onkeyup="checkStock(this); calcSubTotal()" onchange="calcSubTotal()">
                    </div>
                </div>
                <div class="col-xs-5 col-md-2">
                    <div class="form-group">
                        <label for="total[]">Total:</label>
                        <input name="total[]" type="text" class="form-control itemTotal" value = 0 onkeyup="calcSubTotal()">
                    </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-6 col-xs-offset-3">
                <button type="button" class="btn btn-primary btn-block" onclick="addItem()">
                  <i class="fa fa-plus"></i>&nbsp; &nbsp; Add More Item
                </button>
              </div>
            </div>
            <!-- product item end -->
            <!-- add new item button -->
            <hr>
            <div class="row review-order">
                <div class="col-xs-12">
                    <h4 class="text-muted text-center mt-0">Summary</h4>
                </div>
                <div class="col-xs-12">
                    <hr>
                    <div class="row">
                        <div class="col-xs-8">
                            <p class="m-0 text-primary">Sub-Total (tk): </p>
                        </div>
                        <div class="col-xs-4">
                            <input type="number" class="form-control" name="sub_total" id="sub-total" value="0" readonly />
                        </div>
                    </div>
                    <hr class="m-0">
                    <div class="row">
                        <div class="col-xs-8">
                            <p class="m-0 text-primary">Discount (tk): </p>
                        </div>
                        <div class="col-xs-4">
                            <input type="text" class="form-control" name="discount" id="discount" value="0" onkeyup="calcTotal()">
                        </div>
                    </div>
                    <hr class="m-0">
                    <div class="row">
                        <div class="col-xs-8">
                            <p class="m-0 text-primary">Shipping (tk): </p>
                        </div>
                        <div class="col-xs-4">
                            <input type="text" class="form-control" name="shipping" id="shipping" value="0" onkeyup="calcTotal()">
                        </div>
                    </div>
                    <hr class="m-0">
                    <div class="row">
                        <div class="col-xs-8">
                            <p class="m-0 text-primary"><strong>Grand Total (tk): </strong></p>
                        </div>
                        <div class="col-xs-4">
                          <input type="number" class="form-control" name="grand_total" id="grand-total" value="0" readonly />
                        </div>
                    </div>
                    <hr class="m-0">
                    <div class="row">
                        <div class="col-xs-8">
                            <p class="m-0 text-primary">Paid (tk): </p>
                        </div>
                        <div class="col-xs-4">
                            <input type="text" class="form-control" name="paid" id="paid" value="0" onkeyup="calcTotal()">
                        </div>
                    </div>
                    <hr class="m-0">
                    <div class="row">
                        <div class="col-xs-8">
                            <p class="m-0 text-primary">Due (tk): </p>
                        </div>
                        <div class="col-xs-4">
                          <input type="number" class="form-control" name="due" id="due" value="0" readonly />
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="shipping_address">Shipping Address (Optional):</label>
                        <textarea class="form-control" name="shipping_address" id="shipping_address"></textarea>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="note">Note (Optional):</label>
                        <textarea class="form-control" name="note" id="note"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <br>
                        <select name="status" id="status" class="form-control">
                          <option value="">Select One</option>
                          <option value="Paid">Paid</option>
                          <option value="Due">Due</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block" >
                      <i class="fa fa-save"></i>
                      &nbsp; &nbsp; SAVE
                    </button>
                </div>
            </div>
            </form>
          </div>
        </div>
      </div> <!--/.col-12 -->
   </div> <!-- /.row -->
</section> <!-- /.content -->

<datalist id="items"></datalist>

<div id="alertConfirm">
  <div id="alertForm">
    
  </div>
</div>
<div class="loading">
  <img src="/img/loading-waiting.gif" alt="">
</div>
@endsection

@section('scripts')

<script type="text/javascript">
    var productlist = '';
    var total_price = 0;
    const loading = document.querySelector('.loading');

    var add_item   = document.getElementById('add_item');
    var items  = document.getElementById('items');
    items.innerHTML = '';
    var sub_total = document.getElementById('sub_total');
    var discount = document.getElementById('discount');

    function addItem()
    {
      const row = document.getElementById('item-row');

      const fields = document.createElement('div');
      fields.setAttribute('class', 'col-xs-12 no-padding');
      fields.innerHTML = '<div class="col-xs-12 col-md-4">'+
                    '<div class="form-group">'+
                        '<label for="itemname[]">Product Name:</label>'+
                        '<input type="text" name="item[]" class="form-control" required onkeyup="getItem(this)" id="item" onchange="getUnits(this)" list="items" data-id="" autocomplete="off">'+
                    '</div>'+
                '</div>'+
                '<div class="col-xs-4 col-md-2">'+
                    '<div class="form-group">'+
                        '<label for="unit[]">Unit:</label>'+
                        '<select name="unit[]" class="form-control" id="unit" onchange="getUnitPrice(this); calcSubTotal();">'+
                          '<option value="">Select One</option>'+
                        '</select>'+
                    '</div>'+
                '</div>'+
                '<div class="col-xs-4 col-md-2">'+
                    '<div class="form-group">'+
                        '<label for="price[]">Unit Price:</label>'+
                        '<input name="price[]" type="text" class="form-control" onkeyup="calcSubTotal()">'+
                    '</div>'+
                '</div>'+
                '<div class="col-xs-3 col-md-2">'+
                    '<div class="form-group">'+
                        '<label for="qty[]">Qty:</label>'+
                        '<input name="qty[]" type="number" class="form-control" onchange="calcSubTotal()" onkeyup="checkStock(this); calcSubTotal()" min="1" value=0>'+
                    '</div>'+
                '</div>'+
                '<div class="col-xs-5 col-md-2">'+
                    '<div class="form-group">'+
                        '<label for="total[]">Total:</label>'+
                        '<input name="total[]" type="text" class="form-control itemTotal" value=0 onkeyup="calcSubTotal()">'+
                    '</div>'+
                '</div>';
      row.append(fields);
    }

    const subTotal = document.getElementById('sub-total');
    const grandTotal = document.getElementById('grand-total');
    const shipping = document.getElementById('shipping');
    const paid = document.getElementById('paid');
    const due = document.getElementById('due');

    function calcSubTotal()
    {
      const price = document.querySelectorAll('[name="price[]"]');
      const quantity = document.querySelectorAll('[name="qty[]"]');
      const total = document.querySelectorAll('[name="total[]"]');

      let subTotalValue = 0;

      for(let n = 0; n < price.length; n++)
      {
        total[n].value = price[n].value * quantity[n].value;
        subTotalValue += Number(total[n].value);
      }

      subTotal.value = subTotalValue;
      subTotalValue = 0;

      calcTotal();
    }

    function calcTotal()
    {
      grandTotal.value = Number(subTotal.value) - Number(discount.value) + Number(shipping.value);
      due.value = Number(grandTotal.value) - Number(paid.value);
    }

    // remove table row on click close sign
    function removetr(o) {
        // sub_total.value = sub_total.value - o.parentElement.previousElementSibling.firstElementChild.value;

        calcTotal()

        var p = o.parentNode.parentNode;
        p.parentNode.removeChild(p);
    }

    /** ----------------------------- Search Customer by ajax --------------- **/

    function getCustomer(e){
      const mobile = document.getElementById('mobile');
      const name = document.getElementById('name');
      const address = document.getElementById('address');
      const email = document.getElementById('email');

        if(mobile.value.length == 11)
        {
          $.ajax({
            type: 'GET',
            url: '{{route("customer.get-customer", "")}}/'+mobile.value,
            success: function (data) {
              if(data.customer){
                name.value = data.customer.full_name;
                email.value = data.customer.email;
                address.value = data.customer.address;
              }
              else{
                alert('Customer not found. Please create a new customer.');
                return false;
              }
            },
            error: function(data) {
              console.error(data);
            }
          });
        }
    }

    //** ----------------- customer serch end ------------------- **//

      //submit data to the server
      document.getElementById('salesForm').addEventListener('submit', function(e){
        e.preventDefault();
        loading.style.display = 'block';

        const form = e.target;
        const formData = new FormData(form);
        
        let items = document.querySelectorAll('[name="item[]"]');
        // let itemid = Array.from(items).map(item => item.getAttribute('data-id'));

        items.forEach(item => {
          formData.append('item_id[]', item.dataset.id);
        });      
        
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          type: 'POST',
          url: '{{route("sale.store")}}',
          data: formData,
          contentType: false,
          processData: false,
          success: function(data){
            console.log(data);
            loading.style.display = 'none';
            window.location.href = '{{route("sale.index")}}';
          },
          error: function(data){
            console.error(data);
          }
        });
      });

      
    function getItem(e)
    {
      const items = document.getElementById('items');
      $.ajax({
          type: 'GET',
          url: '{{route("product.get.name", "")}}/'+e.value,
          success: function (data){
              var names = '';
              data.item.forEach((val) => {
                  names += '<option value="'+val.name+'" data-id="'+val.id+'">';
              });
              items.innerHTML = names;
          },
          error: function (data){
            console.error(data);
          }
      });
    }
    //** --------- search product by ajax and make datalist ------ **//
    $(document).ready(function(){
      $.ajax({
          type: 'GET',
          url: '{{route("product.get.name")}}',
          success: function (data){
              var names = '<option value="">Select One</option>';

              var obj = JSON.parse(JSON.stringify(data));
              $.each(obj['product'], function (key, val){
                  names += '<option value="'+val.id+'">'+val.name+'</option>';
              });
              productlist = names;
              document.getElementById('item').innerHTML = productlist;
          },
          error: function (data){
            //
          }
      });
    });

    function getUnits(e)
    {
      const items = document.getElementById('items');
      
      for(let i= 0; i < items.options.length; i++)
      {
        if(e.value === items.options[i].value)
        {
          e.dataset.id = items.options[i].dataset.id;
        }
      }
      
      const productId = e.dataset.id;
      const unit = $(e).closest('.form-group').parent().next().find('select[name="unit[]"]');

      $.ajax({
        type: 'GET',
        url: '{{route("product.get-unit", "")}}/'+productId,
        success: function(data){
          // console.log(data);
          let unitName = '<option value="">Select One</option>';
          data.unit.forEach((u) => {
            unitName += '<option value="'+u.unit_name+'" data-id="'+u.id+'" data-price="'+u.price+'" data-alert="'+u.alert_quantity+'" data-stock="'+u.stock.quantity+'" data-convert="'+u.convert_base_unit+'">'+u.unit_name+'</option>';
          });

          unit.html(unitName);
        },
        error: function(data){
          console.error(data);
        },
      });
    }

    function getUnitPrice(e)
    {
      const price = $(e).closest('.form-group').parent().next().find('input[name="price[]"]');
      const selectedUnit = e.options[e.selectedIndex];

      price.val(selectedUnit.dataset.price);

      if(Number(selectedUnit.dataset.stock) < Number(selectedUnit.dataset.alert)){
        alert('Limited stock: '+selectedUnit.dataset.stock);
        e.style.borderColor = 'orange';
      }else{
        e.style.borderColor = '#ddd';
      }
    }

    // for update unit after convert
    let updatedUnit = '';
    let currentPrice = '';

    function checkStock(e)
    {
      const unit = e.parentNode.parentNode.previousElementSibling.previousElementSibling.firstElementChild.firstElementChild.nextElementSibling;

      const item = unit.parentNode.parentNode.previousElementSibling.firstElementChild.firstElementChild.nextElementSibling;

      const selectedUnit = unit.options[unit.selectedIndex];
      if(selectedUnit.dataset.stock < Number(e.value)){
        $.ajax({
          type: 'GET',
          url: '{{route("product.get-unit", "")}}/'+item.dataset.id,
          success: function(data){
            convertableUnits = '';
            if(data.unit.length > 1) {

              data.unit.forEach(u => {
                if(selectedUnit.innerHTML != u.unit_name && u.stock.quantity > 0){
                  convertableUnits += '<option value="'+u.id+'" data-stock="'+u.stock.quantity+'">'+u.unit_name+'</option>';
                }                
              });

              if(convertableUnits != '')
              {
                //show unit convert page
                let form = '<form action="" id="unitConverterForm" method="POST">'+
                  '@csrf'+
                  '<div class="form-group">'+
                    '<label for="">Convert Unit to Base Quantity</label>'+
                      '<select name="unit" id="" class="form-control">'+
                        '<option value="">Select Unit</option>'+
                        convertableUnits+
                      '</select>'+
                      '<input type="hidden" name="product_id" value="'+item.dataset.id+'">'+
                      '<input type="hidden" name="convert_to" value="'+selectedUnit.value+'">'+
                  '</div>'+
                  '<button type="button" class="btn btn-default" onclick="convertUnit(this)" value="No">Close</button>'+
                  '<button type="button" class="btn btn-info pull-right" onclick="convertUnit(this)" value="Yes">Confirm</button>'+
                  '<div class="clearfix"></div>'+
                '</form>';
              
              const alertForm = document.getElementById('alertForm');
              alertForm.innerHTML = form;
              alertForm.parentNode.style.display = 'block';

              updatedUnit = unit;
              currentPrice = e;
              }
              else
              {
                alert('Stock unavailable');
                e.style.borderColor = 'red';
              }

            }
            else
            {
              alert('Stock unavailable');
              e.style.borderColor = 'red';
            }
            
          },
          error: function(data){
            console.error(data);
          }
        });

      }
      else
      {
        e.style.borderColor = '#ddd';
      }
    }

    function convertUnit(e)
    {
      loading.style.display = 'block';
      const unitConverterForm = document.getElementById('unitConverterForm');

      if(e.value == "Yes")
      {
        const formData = new FormData(unitConverterForm);

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          type: 'POST',
          url: '{{route("product-unit.convert")}}',
          data: formData,
          contentType: false,
          processData: false,
          success: function(data){
            let unitName = '<option value="">Select One</option>';
            data.unit.forEach(u => {
              unitName += '<option value="'+u.unit_name+'" data-id="'+u.id+'" data-price="'+u.price+'" data-alert="'+u.alert_quantity+'" data-stock="'+u.stock.quantity+'" data-convert="'+u.convert_base_unit+'" '+(data.selectedUnit == u.unit_name ? 'selected': '')+'>'+u.unit_name+'</option>';
            });

            if(updatedUnit != '')
            {
              updatedUnit.innerHTML = unitName;
              updatedUnit.style.borderColor = '#ddd';
              updatedUnit = '';
              currentPrice = '';
            }
            loading.style.display = 'none';
            unitConverterForm.parentNode.parentNode.style.display = 'none';
          },
          error: function(data){
            console.error(data);
          },
        });
      }
      else if (e.value == 'No')
      {
        if(currentPrice != '')
        {
          currentPrice.style.borderColor = 'red';
        }

        unitConverterForm.parentNode.parentNode.style.display = 'none';
      }

    }
    //select 2
    $(function(){$('.select2').select2();});
  </script>
@endsection