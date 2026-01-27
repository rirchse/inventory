@extends('layouts.dashboard')
@section('title', 'View All Orders')
@section('content')

<div class="px-4 sm:px-6 lg:px-8 py-8">
    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                    {{ $type != '' ? $type : 'All' }} Orders
                </h1>
                <p class="mt-2 text-gray-600 dark:text-gray-400">
                    Manage and view all your sales orders in one place
                </p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="/sale" class="inline-flex items-center px-4 py-2 bg-primary-600 text-white text-sm font-medium rounded-lg hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-colors">
                    <i class="fas fa-plus mr-2"></i>
                    New Order
                </a>
            </div>
        </div>
        
        <!-- Breadcrumb -->
        <nav class="flex mt-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-primary-600 dark:text-gray-400 dark:hover:text-primary-500">
                        <i class="fas fa-home mr-2"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Orders</span>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $type != '' ? $type : 'All' }} Orders</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Search and Filters -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0">
            <div class="flex-1 max-w-md">
                <label for="search_sales" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Search Orders
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" 
                           id="search_sales" 
                           name="table_search" 
                           class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg leading-5 bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 dark:focus:ring-primary-400 dark:focus:border-primary-400 transition-colors" 
                           placeholder="Search by customer name, order number, or mobile...">
                </div>
            </div>
            
            <div class="flex items-center space-x-3">
                <button onclick="refreshOrders()" class="inline-flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors">
                    <i class="fas fa-refresh mr-2"></i>
                    Refresh
                </button>
            </div>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                List of Orders
            </h3>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Showing all orders with their current status and details
            </p>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Order #
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Customer
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Contact
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Address
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Total
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Paid
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Due
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Date
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Sold By
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody id="ordersTable" class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($sales as $sale)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm font-medium text-gray-900 dark:text-white">
                                #{{ $sale->order_no }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div>
                                <div class="text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $sale->full_name }}
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm text-gray-900 dark:text-white">
                                {{ $sale->contact }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900 dark:text-white max-w-xs truncate" title="{{ $sale->shipping_address ?? $sale->address }}">
                                {{ $sale->shipping_address ?? $sale->address }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">
                                ৳{{ number_format($sale->gtotal) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm text-green-600 dark:text-green-400 font-medium">
                                ৳{{ number_format($sale->paid) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm text-red-600 dark:text-red-400 font-medium">
                                ৳{{ number_format($sale->due) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm text-gray-900 dark:text-white">
                                {{ date('d M Y', strtotime($sale->sales_date)) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm text-gray-900 dark:text-white">
                                {{ App\Models\User::find($sale->sold_by) ? App\Models\User::find($sale->sold_by)->name : 'N/A' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($sale->status == 0)
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                    Pending
                                </span>
                            @elseif($sale->status == 1)
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                    Confirmed
                                </span>
                            @elseif($sale->status == 2)
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    Completed
                                </span>
                            @elseif($sale->status == 3)
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                    Cancelled
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('sale.show', $sale->id) }}" 
                                   class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded hover:bg-blue-200 dark:bg-blue-900 dark:text-blue-200 dark:hover:bg-blue-800 transition-colors" 
                                   title="View details">
                                    <i class="fas fa-eye mr-1"></i>
                                    View
                                </a>
                                <a href="{{ route('sale.edit', $sale->id) }}" 
                                   class="inline-flex items-center px-2 py-1 bg-yellow-100 text-yellow-700 text-xs font-medium rounded hover:bg-yellow-200 dark:bg-yellow-900 dark:text-yellow-200 dark:hover:bg-yellow-800 transition-colors" 
                                   title="Edit order">
                                    <i class="fas fa-edit mr-1"></i>
                                    Edit
                                </a>
                                <a href="/sale/{{ $sale->id }}/print" 
                                   class="inline-flex items-center px-2 py-1 {{ $sale->print_status ? 'bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300' : 'bg-primary-100 text-primary-700 dark:bg-primary-900 dark:text-primary-200' }} text-xs font-medium rounded hover:opacity-80 transition-colors" 
                                   title="Print order">
                                    <i class="fas fa-print mr-1"></i>
                                    Print
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($sales->hasPages())
        <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-700 dark:text-gray-300">
                    Showing {{ $sales->firstItem() ?? 0 }} to {{ $sales->lastItem() ?? 0 }} of {{ $sales->total() }} results
                </div>
                <div class="flex items-center space-x-2">
                    {{ $sales->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Search Results Loading Indicator -->
<div id="searchLoading" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white dark:bg-gray-800">
        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-primary-100 dark:bg-primary-900">
                <i class="fas fa-spinner fa-spin text-primary-600 dark:text-primary-400 text-xl"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mt-4">Searching...</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Please wait while we search for orders</p>
        </div>
    </div>
</div>

<script type="text/javascript">
const searchSales = document.getElementById('search_sales');
const searchLoading = document.getElementById('searchLoading');
let searchTimeout;

// Search functionality with debouncing
searchSales.addEventListener('keyup', function() {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
        if (searchSales.value.length > 0) {
            searchSale();
        } else {
            // Reset to original data if search is cleared
            location.reload();
        }
    }, 500);
});

function searchSale() {
    if (searchSales.value.length > 0) {
        showSearchLoading();
        
        $.ajax({
            type: 'GET',
            url: '/search/orders/' + searchSales.value,
            success: function(data) {
                hideSearchLoading();
                
                var obj = JSON.parse(JSON.stringify(data));
                if (obj['success'] == null) {
                    showNotification('Orders not found.', 'warning');
                    return false;
                }

                var orders = "";
                var status = "";

                function dateFormat(element) {
                    var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                    var date = new Date(element);
                    return date.getDate() + ' ' + month[date.getMonth()] + ' ' + date.getFullYear();
                }

                $.each(obj['success'], function(key, val) {
                    if (val.status == 0) {
                        status = '<span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">New Order</span>';
                    } else if (val.status == 1) {
                        status = '<span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">Confirmed</span>';
                    } else if (val.status == 2) {
                        status = '<span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">Completed</span>';
                    } else if (val.status == 3) {
                        status = '<span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">Cancelled</span>';
                    }

                    var order_no = val.order_no || '';
                    var address = val.shipping_address || val.address || 'N/A';

                    orders += '<tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">' +
                        '<td class="px-6 py-4 whitespace-nowrap"><span class="text-sm font-medium text-gray-900 dark:text-white">#' + order_no + '</span></td>' +
                        '<td class="px-6 py-4 whitespace-nowrap"><div><div class="text-sm font-medium text-gray-900 dark:text-white">' + val.full_name + '</div></div></td>' +
                        '<td class="px-6 py-4 whitespace-nowrap"><span class="text-sm text-gray-900 dark:text-white">' + val.contact + '</span></td>' +
                        '<td class="px-6 py-4"><div class="text-sm text-gray-900 dark:text-white max-w-xs truncate" title="' + address + '">' + address + '</div></td>' +
                        '<td class="px-6 py-4 whitespace-nowrap"><span class="text-sm font-semibold text-gray-900 dark:text-white">৳' + val.gtotal + '</span></td>' +
                        '<td class="px-6 py-4 whitespace-nowrap"><span class="text-sm text-green-600 dark:text-green-400 font-medium">৳' + val.paid + '</span></td>' +
                        '<td class="px-6 py-4 whitespace-nowrap"><span class="text-sm text-red-600 dark:text-red-400 font-medium">৳' + val.due + '</span></td>' +
                        '<td class="px-6 py-4 whitespace-nowrap"><span class="text-sm text-gray-900 dark:text-white">' + dateFormat(val.sales_date) + '</span></td>' +
                        '<td class="px-6 py-4 whitespace-nowrap"><span class="text-sm text-gray-900 dark:text-white">' + (val.name || 'N/A') + '</span></td>' +
                        '<td class="px-6 py-4 whitespace-nowrap">' + status + '</td>' +
                        '<td class="px-6 py-4 whitespace-nowrap text-sm font-medium">' +
                        '<div class="flex items-center space-x-2">' +
                        '<a href="/sale/' + val.id + '" class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded hover:bg-blue-200 dark:bg-blue-900 dark:text-blue-200 dark:hover:bg-blue-800 transition-colors" title="View details"><i class="fas fa-eye mr-1"></i>View</a>' +
                        '<a href="/sale/' + val.id + '/edit" class="inline-flex items-center px-2 py-1 bg-yellow-100 text-yellow-700 text-xs font-medium rounded hover:bg-yellow-200 dark:bg-yellow-900 dark:text-yellow-200 dark:hover:bg-yellow-800 transition-colors" title="Edit order"><i class="fas fa-edit mr-1"></i>Edit</a>' +
                        '<a href="/return/' + val.id + '/order" class="inline-flex items-center px-2 py-1 bg-gray-100 text-gray-700 text-xs font-medium rounded hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 transition-colors" title="Add to return"><i class="fas fa-undo mr-1"></i>Return</a>' +
                        '</div></td>' +
                        '</tr>';
                });

                $("#ordersTable").html(orders);
                showNotification('Found ' + obj['success'].length + ' orders matching your search.', 'success');
            },
            error: function(data) {
                hideSearchLoading();
                showNotification('Could not retrieve data from database!', 'error');
            }
        });
    }
}

function showSearchLoading() {
    searchLoading.classList.remove('hidden');
}

function hideSearchLoading() {
    searchLoading.classList.add('hidden');
}

function refreshOrders() {
    location.reload();
}

function showNotification(message, type) {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 px-6 py-4 rounded-lg shadow-lg transition-all duration-300 transform translate-x-full`;
    
    // Set colors based on type
    if (type === 'success') {
        notification.className += ' bg-green-500 text-white';
    } else if (type === 'warning') {
        notification.className += ' bg-yellow-500 text-white';
    } else if (type === 'error') {
        notification.className += ' bg-red-500 text-white';
    } else {
        notification.className += ' bg-blue-500 text-white';
    }
    
    notification.innerHTML = `
        <div class="flex items-center">
            <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'warning' ? 'exclamation-triangle' : type === 'error' ? 'times-circle' : 'info-circle'} mr-2"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 100);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 5000);
}
</script>
@endsection