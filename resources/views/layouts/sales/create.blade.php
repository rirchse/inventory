@extends('layouts.dashboard')
@section('title', 'Point of Sale - Create Order')
@section('content')

<div class="px-4 sm:px-6 lg:px-8 py-8">
    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">{{ __('dashboard.pos') }}</h1>
                <p class="text-gray-600 mt-2">Create a new sales order</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('sale.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                    <i class="fas fa-list mr-2"></i>
                    View All Orders
                </a>
            </div>
        </div>
        
        <!-- Breadcrumb -->
        <nav class="flex mt-4" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-4">
                <li>
                    <div>
                        <a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-gray-500">
                            <i class="fas fa-home"></i>
                            <span class="sr-only">Dashboard</span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <a href="#" class="text-gray-400 hover:text-gray-500">Sales</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="text-gray-500">Create Order</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Main Form -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Order Information</h3>
        </div>
        
        <form id="salesForm" action="" class="p-6">
            @csrf
            
            <!-- Customer Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div>
                    <label for="mobile" class="block text-sm font-medium text-gray-700 mb-2">Mobile Number *</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500" type="text" name="mobile" id="mobile" required onkeyup="getCustomer(this)" placeholder="Enter mobile number">
                </div>
                
                <div>
                    <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-2">Customer Name *</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500" type="text" name="customer_name" id="name" required placeholder="Enter customer name">
                </div>
                
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address *</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500" type="text" name="address" id="address" required placeholder="Enter address">
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email (Optional)</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500" type="email" name="email" id="email" placeholder="Enter email">
                </div>
                
                <div>
                    <label for="sales_date" class="block text-sm font-medium text-gray-700 mb-2">Sales Date *</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500" type="date" name="sales_date" id="sales_date" required>
                </div>
                
                <div>
                    <label for="order_no" class="block text-sm font-medium text-gray-700 mb-2">Order No (Optional)</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500" type="text" name="order_no" placeholder="Enter order number">
                </div>
            </div>

            <hr class="my-8">

            <!-- Product Items -->
            <div class="mb-8">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="text-lg font-medium text-gray-900">Product Items</h4>
                    <button type="button" onclick="addItem()" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        <i class="fas fa-plus mr-2"></i>
                        Add Item
                    </button>
                </div>

                <!-- Product Item Row -->
                <div id="item-row">
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4 p-4 bg-gray-50 rounded-lg">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Product Name *</label>
                            <input type="text" name="item[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500" required onkeyup="getItem(this)" id="item" onchange="getUnits(this)" list="items" data-id="" autocomplete="off" oninput="this.removeAttribute('title')" placeholder="Search product...">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Unit *</label>
                            <select name="unit[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500" onchange="getUnitPrice(this); calcSubTotal()">
                                <option value="">Select Unit</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Unit Price</label>
                            <input name="price[]" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500" onkeyup="calcSubTotal()" placeholder="0.00">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Quantity *</label>
                            <input name="qty[]" type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500" min="1" value="0" onkeyup="checkStock(this); calcSubTotal()" onchange="calcSubTotal()">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Total</label>
                            <input name="total[]" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-100" value="0" readonly>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="bg-gray-50 rounded-lg p-6 mb-8">
                <h4 class="text-lg font-medium text-gray-900 mb-4">Order Summary</h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Sub-Total:</span>
                            <input type="number" class="text-right px-3 py-2 border border-gray-300 rounded-lg bg-white" name="sub_total" id="sub-total" value="0" readonly />
                        </div>
                        
                        <div class="flex justify-between">
                            <span class="text-gray-600">Discount:</span>
                            <input type="text" class="text-right px-3 py-2 border border-gray-300 rounded-lg" name="discount" id="discount" value="0" onkeyup="calcTotal()" placeholder="0.00">
                        </div>
                        
                        <div class="flex justify-between">
                            <span class="text-gray-600">Shipping:</span>
                            <input type="text" class="text-right px-3 py-2 border border-gray-300 rounded-lg" name="shipping" id="shipping" value="0" onkeyup="calcTotal()" placeholder="0.00">
                        </div>
                        
                        <div class="flex justify-between text-lg font-semibold">
                            <span class="text-gray-900">Grand Total:</span>
                            <input type="number" class="text-right px-3 py-2 border border-gray-300 rounded-lg bg-white font-semibold" name="grand_total" id="grand-total" value="0" readonly />
                        </div>
                        
                        <div class="flex justify-between">
                            <span class="text-gray-600">Paid Amount:</span>
                            <input type="text" class="text-right px-3 py-2 border border-gray-300 rounded-lg" name="paid" id="paid" value="0" onkeyup="calcTotal()" placeholder="0.00">
                        </div>
                        
                        <div class="flex justify-between">
                            <span class="text-gray-600">Due Amount:</span>
                            <input type="number" class="text-right px-3 py-2 border border-gray-300 rounded-lg bg-white" name="due" id="due" value="0" readonly />
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Order Status</label>
                            <select name="status" id="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                                <option value="">Select Status</option>
                                <option value="Paid">Paid</option>
                                <option value="Due">Due</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="shipping_address" class="block text-sm font-medium text-gray-700 mb-2">Shipping Address (Optional)</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500" name="shipping_address" id="shipping_address" rows="3" placeholder="Enter shipping address"></textarea>
                        </div>
                        
                        <div>
                            <label for="note" class="block text-sm font-medium text-gray-700 mb-2">Note (Optional)</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500" name="note" id="note" rows="3" placeholder="Enter any additional notes"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                    <i class="fas fa-save mr-2"></i>
                    Create Order
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Datalist for products -->
<datalist id="items"></datalist>

<!-- Unit Conversion Modal -->
<div id="alertConfirm" class="fixed inset-0 bg-gray-600 bg-opacity-75 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div id="alertForm" class="bg-white rounded-lg shadow-xl max-w-md w-full p-6">
            <!-- Modal content will be inserted here -->
        </div>
    </div>
</div>

<!-- Loading Overlay -->
<div class="loading fixed inset-0 bg-gray-600 bg-opacity-75 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg p-6 flex flex-col items-center">
            <img src="/img/loading-waiting.gif" alt="Loading..." class="w-16 h-16 mb-4">
            <p class="text-gray-600">Processing order...</p>
        </div>
    </div>
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
      fields.setAttribute('class', 'grid grid-cols-1 md:grid-cols-5 gap-4 p-4 bg-gray-50 rounded-lg mt-4');
      fields.innerHTML = '<div>'+
                    '<label class="block text-sm font-medium text-gray-700 mb-2">Product Name *</label>'+
                    '<input type="text" name="item[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500" required onkeyup="getItem(this)" id="item" onchange="getUnits(this)" list="items" data-id="" autocomplete="off" placeholder="Search product...">'+
                '</div>'+
                '<div>'+
                    '<label class="block text-sm font-medium text-gray-700 mb-2">Unit *</label>'+
                    '<select name="unit[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500" id="unit" onchange="getUnitPrice(this); calcSubTotal();">'+
                      '<option value="">Select Unit</option>'+
                    '</select>'+
                '</div>'+
                '<div>'+
                    '<label class="block text-sm font-medium text-gray-700 mb-2">Unit Price</label>'+
                    '<input name="price[]" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500" onchange="calcSubTotal()" onkeyup="checkStock(this); calcSubTotal()" placeholder="0.00">'+
                '</div>'+
                '<div>'+
                    '<label class="block text-sm font-medium text-gray-700 mb-2">Quantity *</label>'+
                    '<input name="qty[]" type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500" onchange="calcSubTotal()" onkeyup="checkStock(this); calcSubTotal()" min="1" value="0">'+
                '</div>'+
                '<div>'+
                    '<label class="block text-sm font-medium text-gray-700 mb-2">Total</label>'+
                    '<input name="total[]" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-100" value="0" readonly>'+
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
        loading.classList.remove('hidden');

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
            loading.classList.add('hidden');
            window.location.href = '{{route("sale.index")}}';
          },
          error: function(data){
            console.error(data);
            loading.classList.add('hidden');
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
      const unit = $(e).closest('.grid').find('select[name="unit[]"]');

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
      const price = $(e).closest('.grid').find('input[name="price[]"]');
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
                  '<div class="mb-4">'+
                    '<label class="block text-sm font-medium text-gray-700 mb-2">Convert Unit to Base Quantity</label>'+
                      '<select name="unit" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">'+
                        '<option value="">Select Unit</option>'+
                        convertableUnits+
                      '</select>'+
                      '<input type="hidden" name="product_id" value="'+item.dataset.id+'">'+
                      '<input type="hidden" name="convert_to" value="'+selectedUnit.value+'">'+
                  '</div>'+
                  '<div class="flex justify-end space-x-3">'+
                    '<button type="button" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50" onclick="convertUnit(this)" value="No">Close</button>'+
                    '<button type="button" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700" onclick="convertUnit(this)" value="Yes">Confirm</button>'+
                  '</div>'+
                '</form>';
              
              const alertForm = document.getElementById('alertForm');
              alertForm.innerHTML = form;
              alertForm.parentNode.classList.remove('hidden');

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
      loading.classList.remove('hidden');
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
            loading.classList.add('hidden');
            unitConverterForm.parentNode.parentNode.classList.add('hidden');
          },
          error: function(data){
            console.error(data);
            loading.classList.add('hidden');
          },
        });
      }
      else if (e.value == 'No')
      {
        if(currentPrice != '')
        {
          currentPrice.style.borderColor = 'red';
        }

        unitConverterForm.parentNode.parentNode.classList.add('hidden');
      }

    }
    //select 2
    $(function(){$('.select2').select2();});
  </script>
@endsection