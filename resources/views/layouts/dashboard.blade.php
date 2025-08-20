<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', __('dashboard.page_title'))</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bengali Font Support -->
    <link href="https://fonts.maateen.me/bangla/font.css" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        },
                        secondary: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'Bangla', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <style>
        /* CSS Variables for Theme */
        :root {
            --bg-primary: #ffffff;
            --bg-secondary: #f8fafc;
            --bg-tertiary: #f1f5f9;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --text-tertiary: #9ca3af;
            --border-primary: #e5e7eb;
            --border-secondary: #d1d5db;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --primary-50: #eff6ff;
            --primary-100: #dbeafe;
            --primary-600: #2563eb;
            --primary-700: #1d4ed8;
            --scrollbar-track: #f1f5f9;
            --scrollbar-thumb: #cbd5e1;
            --scrollbar-thumb-hover: #94a3b8;
        }

        [data-theme="dark"] {
            --bg-primary: #1f2937;
            --bg-secondary: #111827;
            --bg-tertiary: #374151;
            --text-primary: #f9fafb;
            --text-secondary: #d1d5db;
            --text-tertiary: #9ca3af;
            --border-primary: #374151;
            --border-secondary: #4b5563;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.3);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.4), 0 2px 4px -2px rgb(0 0 0 / 0.4);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.5), 0 4px 6px -4px rgb(0 0 0 / 0.5);
            --primary-50: #1e3a8a;
            --primary-100: #1e40af;
            --scrollbar-track: #374151;
            --scrollbar-thumb: #6b7280;
            --scrollbar-thumb-hover: #9ca3af;
        }

        /* Apply theme variables */
        body {
            background-color: var(--bg-secondary);
            color: var(--text-primary);
        }

        /* Header */
        header {
            background-color: var(--bg-primary);
            border-color: var(--border-primary);
            box-shadow: var(--shadow-sm);
        }

        /* Sidebar */
        #sidebar {
            background-color: var(--bg-primary);
            box-shadow: var(--shadow-lg);
        }

        #sidebar .border-b {
            border-color: var(--border-primary);
        }

        /* Cards and containers */
        .bg-white {
            background-color: var(--bg-primary) !important;
        }

        .text-gray-900 {
            color: var(--text-primary) !important;
        }

        .text-gray-700 {
            color: var(--text-secondary) !important;
        }

        .text-gray-600 {
            color: var(--text-secondary) !important;
        }

        .text-gray-500 {
            color: var(--text-tertiary) !important;
        }

        .text-gray-400 {
            color: var(--text-tertiary) !important;
        }

        .border-gray-200 {
            border-color: var(--border-primary) !important;
        }

        .border-gray-300 {
            border-color: var(--border-secondary) !important;
        }

        .bg-gray-50 {
            background-color: var(--bg-tertiary) !important;
        }

        .bg-gray-100 {
            background-color: var(--bg-tertiary) !important;
        }

        .shadow-sm {
            box-shadow: var(--shadow-sm) !important;
        }

        .shadow-lg {
            box-shadow: var(--shadow-lg) !important;
        }

        /* Bengali font support */
        .lang-bn {
            font-family: 'Bangla', 'Inter', sans-serif;
        }
        
        /* Custom scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-track {
            background: var(--scrollbar-track);
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: var(--scrollbar-thumb);
            border-radius: 3px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: var(--scrollbar-thumb-hover);
        }
        
        /* Language dropdown styles */
        #language-menu.visible {
            opacity: 1;
            visibility: visible;
            transform: scale(1);
        }
        
        #language-menu:not(.visible) {
            opacity: 0;
            visibility: hidden;
            transform: scale(0.95);
        }
        
        /* User dropdown styles */
        #user-menu.visible {
            opacity: 1;
            visibility: visible;
            transform: scale(1);
        }
        
        #user-menu:not(.visible) {
            opacity: 0;
            visibility: hidden;
            transform: scale(0.95);
        }
    </style>
</head>

<body class="bg-gray-50 font-sans {{ app()->getLocale() === 'bn' ? 'lang-bn' : '' }}">
    @php
        $pageName = 'dashboard';
        $showSupport = true;
        $showActionButtons = false;
        $showFullFooter = true;
    @endphp
    
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="w-full px-1 sm:px-6 lg:px-2">
            <div class="flex justify-between items-center h-16">
                <!-- Logo and Menu Toggle -->
                <div class="flex items-center space-x-4">
                    <!-- Mobile menu button -->
                    <button id="mobile-menu-button" class="lg:hidden p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    
                    <!-- Logo -->
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-primary-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-boxes text-white text-xl"></i>
                        </div>
                        <span class="text-2xl font-bold text-gray-900">{{ __('dashboard.app_name') }}</span>
                    </div>
                </div>
                
                <!-- Right side -->
                <div class="flex items-center space-x-4">
                    <!-- Dark Mode Toggle -->
                    <button id="theme-toggle" class="p-2 text-gray-400 hover:text-gray-500 rounded-lg transition-colors" title="{{ __('dashboard.toggle_dark_mode') }}">
                        <i id="theme-toggle-light-icon" class="fas fa-moon text-xl"></i>
                        <i id="theme-toggle-dark-icon" class="fas fa-sun text-xl hidden"></i>
                    </button>

                    <!-- Language Dropdown -->
                    <div class="relative">
                        <button id="language-button" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">
                            <i class="fas fa-globe mr-2"></i>
                            @if(app()->getLocale() === 'bn')
                                বাংলা
                            @else
                                English
                            @endif
                            <i id="language-chevron" class="fas fa-chevron-down ml-2 text-xs transition-transform"></i>
                        </button>
                        
                        <!-- Language Menu -->
                        <div id="language-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 opacity-0 invisible scale-95 transform transition-all duration-200 ease-out z-50">
                            <div class="py-2">
                                <a href="{{ route('language.switch', 'en') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                    <img src="https://flagcdn.com/w20/us.png" alt="English" class="w-4 h-3 mr-3 rounded-sm">
                                    English
                                    @if(app()->getLocale() === 'en')
                                        <i class="fas fa-check ml-auto text-primary-600"></i>
                                    @endif
                                </a>
                                <a href="{{ route('language.switch', 'bn') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                    <img src="https://flagcdn.com/w20/bd.png" alt="বাংলা" class="w-4 h-3 mr-3 rounded-sm">
                                    বাংলা
                                    @if(app()->getLocale() === 'en')
                                        <i class="fas fa-check ml-auto text-primary-600"></i>
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Notifications -->
                    <button class="p-2 text-gray-400 hover:text-gray-500 relative">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-400"></span>
                    </button>
                    
                    <!-- User menu -->
                    <div class="relative">
                        <button id="user-menu-button" class="flex items-center space-x-3 text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                            <div class="w-8 h-8 bg-primary-600 rounded-full flex items-center justify-center">
                                <span class="text-white font-medium">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                            <span class="text-gray-700 font-medium">{{ Auth::user()->name }}</span>
                            <i id="user-chevron" class="fas fa-chevron-down text-gray-400 transition-transform"></i>
                        </button>
                        
                        <!-- User Menu Dropdown -->
                        <div id="user-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 opacity-0 invisible scale-95 transform transition-all duration-200 ease-out z-50">
                            <div class="py-2">
                                <div class="px-4 py-3 border-b border-gray-200">
                                    <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                                    <p class="text-xs text-primary-600 font-medium">{{ Auth::user()->authRole()->name }}</p>
                                </div>
                                <a href="{{ route('user.show', Auth::id()) }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                    <i class="fas fa-user w-4 h-4 mr-3"></i>
                                    {{ __('dashboard.update_profile') }}
                                </a>
                                <a href="/change_password" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                    <i class="fas fa-lock w-4 h-4 mr-3"></i>
                                    {{ __('dashboard.change_password') }}
                                </a>
                                <div class="border-t border-gray-200 my-2"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left flex items-center px-4 py-2 text-sm text-red-700 hover:bg-red-50 hover:text-red-900 transition-colors">
                                        <i class="fas fa-sign-out-alt w-4 h-4 mr-3"></i>
                                        {{ __('dashboard.logout') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out lg:static lg:inset-0">
            <!-- Sidebar Header -->
            <div class="flex items-center justify-between h-16 px-6 border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-primary-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-boxes text-white text-sm"></i>
                    </div>
                    <span class="text-lg font-semibold text-gray-900">{{ __('dashboard.app_name') }}</span>
                </div>
                <button id="close-sidebar" class="lg:hidden p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Sidebar Content -->
            <div class="flex-1 overflow-y-auto">
                <!-- Debug Info (remove after testing) -->
                <div class="px-4 py-2 text-xs text-gray-500 bg-gray-100 rounded mb-4">
                    <div>Current Locale: {{ app()->getLocale() }}</div>
                    <div>Session Locale: {{ session('locale') }}</div>
                    <div>Test Translation: {{ __('dashboard.pos') }}</div>
                </div>
                
                <nav class="px-4 py-6 space-y-2">
                    <!-- Dashboard -->
                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary-700 transition-colors {{ request()->routeIs('dashboard') ? 'bg-primary-50 text-primary-700' : '' }}">
                        <i class="fas fa-tachometer-alt w-5 h-5 mr-3"></i>
                        <span class="font-medium">{{ __('dashboard.dashboard') }}</span>
                    </a>

                    <!-- Sales -->
                    <div class="space-y-1">
                        <button class="w-full flex items-center justify-between px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary-700 transition-colors" onclick="toggleSubmenu('sales-submenu')">
                            <div class="flex items-center">
                                <i class="fas fa-shopping-cart w-5 h-5 mr-3"></i>
                                <span class="font-medium">{{ __('dashboard.sales') }}</span>
                            </div>
                            <i class="fas fa-chevron-down w-4 h-4 transition-transform" id="sales-chevron"></i>
                        </button>
                        <div id="sales-submenu" class="hidden pl-8 space-y-1">
                            <a href="{{ route('sale.create') }}" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-cash-register w-4 h-4 mr-2"></i>{{ __('dashboard.pos') }}
                            </a>
                            <a href="{{ route('sale.index') }}" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-list w-4 h-4 mr-2"></i>{{ __('dashboard.view_all_sales') }}
                            </a>
                            <a href="/sale/All/Daily" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-calendar-day w-4 h-4 mr-2"></i>{{ __('dashboard.view_daily_sales') }}
                            </a>
                            <a href="/sale/New/view" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-plus-circle w-4 h-4 mr-2"></i>{{ __('dashboard.new_sales') }}
                            </a>
                            <a href="/sale/Confirmed/view" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-check-circle w-4 h-4 mr-2"></i>{{ __('dashboard.confirmed_sales') }}
                            </a>
                            <a href="/sale/Completed/view" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-check-double w-4 h-4 mr-2"></i>{{ __('dashboard.completed_sales') }}
                            </a>
                            <a href="/sale/Cancelled/view" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-times-circle w-4 h-4 mr-2"></i>{{ __('dashboard.cancelled_sales') }}
                            </a>
                            <a href="{{ route('sale-return.index') }}" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-undo w-4 h-4 mr-2"></i>{{ __('dashboard.returned_sales') }}
                            </a>
                        </div>
                    </div>

                    <!-- Payments -->
                    <div class="space-y-1">
                        <button class="w-full flex items-center justify-between px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary-700 transition-colors" onclick="toggleSubmenu('payments-submenu')">
                            <div class="flex items-center">
                                <i class="fas fa-money-bill w-5 h-5 mr-3"></i>
                                <span class="font-medium">{{ __('dashboard.payments') }}</span>
                            </div>
                            <i class="fas fa-chevron-down w-4 h-4 transition-transform" id="payments-chevron"></i>
                        </button>
                        <div id="payments-submenu" class="hidden pl-8 space-y-1">
                            <a href="/payment" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-credit-card w-4 h-4 mr-2"></i>{{ __('dashboard.view_payments') }}
                            </a>
                            <a href="/payment/bKash/view" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-mobile-alt w-4 h-4 mr-2"></i>{{ __('dashboard.bkash_payments') }}
                            </a>
                            <a href="/payment/Rocket/view" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-rocket w-4 h-4 mr-2"></i>{{ __('dashboard.rocket_payments') }}
                            </a>
                            <a href="/payment/Nagad/view" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-wallet w-4 h-4 mr-2"></i>{{ __('dashboard.nagad_payments') }}
                            </a>
                            <a href="/payment/Cash/view" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-money-bill-wave w-4 h-4 mr-2"></i>{{ __('dashboard.cash_payments') }}
                            </a>
                        </div>
                    </div>

                    <!-- Customers -->
                    <div class="space-y-1">
                        <button class="w-full flex items-center justify-between px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary-700 transition-colors" onclick="toggleSubmenu('customers-submenu')">
                            <div class="flex items-center">
                                <i class="fas fa-users w-5 h-5 mr-3"></i>
                                <span class="font-medium">{{ __('dashboard.customers') }}</span>
                            </div>
                            <i class="text-xs transition-transform" id="customers-chevron"></i>
                        </button>
                        <div id="customers-submenu" class="hidden pl-8 space-y-1">
                            <a href="{{ route('customer.index') }}" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-users w-4 h-4 mr-2"></i>{{ __('dashboard.view_customers') }}
                            </a>
                        </div>
                    </div>

                    <!-- Purchase -->
                    <div class="space-y-1">
                        <button class="w-full flex items-center justify-between px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary-700 transition-colors" onclick="toggleSubmenu('purchase-submenu')">
                            <div class="flex items-center">
                                <i class="fas fa-list-ul w-5 h-5 mr-3"></i>
                                <span class="font-medium">{{ __('dashboard.purchase') }}</span>
                            </div>
                            <i class="fas fa-chevron-down w-4 h-4 transition-transform" id="purchase-chevron"></i>
                        </button>
                        <div id="purchase-submenu" class="hidden pl-8 space-y-1">
                            <a href="{{ route('purchase.index') }}" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-shopping-cart w-4 h-4 mr-2"></i>{{ __('dashboard.view_purchase_list') }}
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-undo-alt w-4 h-4 mr-2"></i>{{ __('dashboard.purchase_returns') }}
                            </a>
                        </div>
                    </div>

                    <!-- Suppliers -->
                    <div class="space-y-1">
                        <button class="w-full flex items-center justify-between px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary-700 transition-colors" onclick="toggleSubmenu('suppliers-submenu')">
                            <div class="flex items-center">
                                <i class="fas fa-user-tie w-5 h-5 mr-3"></i>
                                <span class="font-medium">{{ __('dashboard.suppliers') }}</span>
                            </div>
                            <i class="fas fa-chevron-down w-4 h-4 transition-transform" id="suppliers-chevron"></i>
                        </button>
                        <div id="suppliers-submenu" class="hidden pl-8 space-y-1">
                            <a href="{{ route('vendor.index') }}" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-truck w-4 h-4 mr-2"></i>{{ __('dashboard.view_suppliers') }}
                            </a>
                        </div>
                    </div>

                    <!-- Products -->
                    <div class="space-y-1">
                        <button class="w-full flex items-center justify-between px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary-700 transition-colors" onclick="toggleSubmenu('products-submenu')">
                            <div class="flex items-center">
                                <i class="fas fa-cubes w-5 h-5 mr-3"></i>
                                <span class="font-medium">{{ __('dashboard.products') }}</span>
                            </div>
                            <i class="fas fa-chevron-down w-4 h-4 transition-transform" id="products-chevron"></i>
                        </button>
                        <div id="products-submenu" class="hidden pl-8 space-y-1">
                            <a href="{{ route('product.index') }}" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-boxes w-4 h-4 mr-2"></i>{{ __('dashboard.view_products') }}
                            </a>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="space-y-1">
                        <button class="w-full flex items-center justify-between px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary-700 transition-colors" onclick="toggleSubmenu('categories-submenu')">
                            <div class="flex items-center">
                                <i class="fas fa-object-ungroup w-5 h-5 mr-3"></i>
                                <span class="font-medium">{{ __('dashboard.categories') }}</span>
                            </div>
                            <i class="fas fa-chevron-down w-4 h-4 transition-transform" id="categories-chevron"></i>
                        </button>
                        <div id="categories-submenu" class="hidden pl-8 space-y-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-tags w-4 h-4 mr-2"></i>{{ __('dashboard.view_categories') }}
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-crown w-4 h-4 mr-2"></i>{{ __('dashboard.view_brands') }}
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-cube w-4 h-4 mr-2"></i>{{ __('dashboard.view_models') }}
                            </a>
                        </div>
                    </div>

                    <!-- Reports -->
                    <div class="space-y-1">
                        <button class="w-full flex items-center justify-between px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary-700 transition-colors" onclick="toggleSubmenu('reports-submenu')">
                            <div class="flex items-center">
                                <i class="fas fa-chart-line w-5 h-5 mr-3"></i>
                                <span class="font-medium">{{ __('dashboard.reports') }}</span>
                            </div>
                            <i class="fas fa-chevron-down w-4 h-4 transition-transform" id="reports-chevron"></i>
                        </button>
                        <div id="reports-submenu" class="hidden pl-8 space-y-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-chart-line w-4 h-4 mr-2"></i>{{ __('dashboard.sales_report') }}
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-chart-bar w-4 h-4 mr-2"></i>{{ __('dashboard.stock_report') }}
                            </a>
                        </div>
                    </div>

                    @if(Auth::user()->authorizeRoles(['SuperAdmin', 'Admin']))
                    <!-- Accounts -->
                    <div class="space-y-1">
                        <button class="w-full flex items-center justify-between px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary-700 transition-colors" onclick="toggleSubmenu('accounts-submenu')">
                            <div class="flex items-center">
                                <i class="fas fa-user-secret w-5 h-5 mr-3"></i>
                                <span class="font-medium">{{ __('dashboard.accounts') }}</span>
                            </div>
                            <i class="fas fa-chevron-down w-4 h-4 transition-transform" id="accounts-chevron"></i>
                        </button>
                        <div id="accounts-submenu" class="hidden pl-8 space-y-1">
                            <a href="{{ route('user.create') }}" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-user-plus w-4 h-4 mr-2"></i>{{ __('dashboard.create_user') }}
                            </a>
                            <a href="{{ route('user.index') }}" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-users-cog w-4 h-4 mr-2"></i>{{ __('dashboard.view_users') }}
                            </a>
                        </div>
                    </div>
                    @endif

                    <!-- Settings -->
                    <div class="space-y-1">
                        <button class="w-full flex items-center justify-between px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary-700 transition-colors" onclick="toggleSubmenu('settings-submenu')">
                            <div class="flex items-center">
                                <i class="fas fa-cog w-5 h-5 mr-3"></i>
                                <span class="font-medium">{{ __('dashboard.settings') }}</span>
                            </div>
                            <i class="fas fa-chevron-down w-4 h-4 transition-transform" id="settings-chevron"></i>
                        </button>
                        <div id="settings-submenu" class="hidden pl-8 space-y-1">
                            <a href="{{ route('user.show', Auth::id()) }}" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-user-edit w-4 h-4 mr-2"></i>{{ __('dashboard.update_profile') }}
                            </a>
                            <a href="/change_password" class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <i class="fas fa-key w-4 h-4 mr-2"></i>{{ __('dashboard.change_password') }}
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </aside>

        <!-- Overlay for mobile -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-gray-600 bg-opacity-75 z-40 lg:hidden hidden"></div>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col lg:ml-64">
            <!-- Content Section -->
            @yield('content')
        </div>
    </div>

    <!-- Footer - Full Width -->
    @include('partials.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    <!-- Dashboard Scripts -->
    <script>
        // Sidebar functionality
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const closeSidebarButton = document.getElementById('close-sidebar');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebar-overlay');

            // Mobile menu toggle
            mobileMenuButton.addEventListener('click', function() {
                sidebar.classList.remove('-translate-x-full');
                sidebarOverlay.classList.remove('hidden');
            });

            // Close sidebar
            closeSidebarButton.addEventListener('click', function() {
                sidebar.classList.add('-translate-x-full');
                sidebarOverlay.classList.add('hidden');
            });

            // Close sidebar when clicking overlay
            sidebarOverlay.addEventListener('click', function() {
                sidebar.classList.add('-translate-x-full');
                sidebarOverlay.classList.add('hidden');
            });

            // Close sidebar on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    sidebar.classList.add('-translate-x-full');
                    sidebarOverlay.classList.add('hidden');
                }
            });

            // Language dropdown functionality
            const languageButton = document.getElementById('language-button');
            const languageMenu = document.getElementById('language-menu');
            const languageChevron = document.getElementById('language-chevron');
            let isLanguageOpen = false;
            
            // Toggle language dropdown
            languageButton.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                toggleLanguageDropdown();
            });
            
            // Close language dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!languageButton.contains(e.target) && !languageMenu.contains(e.target)) {
                    closeLanguageDropdown();
                }
            });
            
            // Close language dropdown on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeLanguageDropdown();
                }
            });
            
            function toggleLanguageDropdown() {
                if (isLanguageOpen) {
                    closeLanguageDropdown();
                } else {
                    openLanguageDropdown();
                }
            }
            
            function openLanguageDropdown() {
                isLanguageOpen = true;
                languageMenu.classList.add('visible');
                languageChevron.style.transform = 'rotate(180deg)';
            }
            
            function closeLanguageDropdown() {
                isLanguageOpen = false;
                languageMenu.classList.remove('visible');
                languageChevron.style.transform = 'rotate(0deg)';
            }

            // User dropdown functionality
            const userMenuButton = document.getElementById('user-menu-button');
            const userMenu = document.getElementById('user-menu');
            const userChevron = document.getElementById('user-chevron');
            let isUserMenuOpen = false;
            
            // Toggle user dropdown
            userMenuButton.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                toggleUserDropdown();
            });
            
            // Close user dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!userMenuButton.contains(e.target) && !userMenu.contains(e.target)) {
                    closeUserDropdown();
                }
            });
            
            // Close user dropdown on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeUserDropdown();
                }
            });
            
            function toggleUserDropdown() {
                if (isUserMenuOpen) {
                    closeUserDropdown();
                } else {
                    openUserDropdown();
                }
            }
            
            function openUserDropdown() {
                isUserMenuOpen = true;
                userMenu.classList.add('visible');
                userChevron.style.transform = 'rotate(180deg)';
            }
            
            function closeUserDropdown() {
                isUserMenuOpen = false;
                userMenu.classList.remove('visible');
                userChevron.style.transform = 'rotate(0deg)';
            }

            // Dark mode toggle functionality
            const themeToggle = document.getElementById('theme-toggle');
            const lightIcon = document.getElementById('theme-toggle-light-icon');
            const darkIcon = document.getElementById('theme-toggle-dark-icon');
            
            // Check for saved theme preference or default to light mode
            const currentTheme = localStorage.getItem('theme') || 'light';
            
            // Apply the current theme
            if (currentTheme === 'dark') {
                document.documentElement.setAttribute('data-theme', 'dark');
                lightIcon.classList.add('hidden');
                darkIcon.classList.remove('hidden');
            } else {
                document.documentElement.setAttribute('data-theme', 'light');
                lightIcon.classList.remove('hidden');
                darkIcon.classList.add('hidden');
            }
            
            // Toggle theme on button click
            themeToggle.addEventListener('click', function() {
                const currentTheme = document.documentElement.getAttribute('data-theme');
                const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                
                document.documentElement.setAttribute('data-theme', 'newTheme');
                localStorage.setItem('theme', newTheme);
                
                if (newTheme === 'dark') {
                    lightIcon.classList.add('hidden');
                    darkIcon.classList.remove('hidden');
                } else {
                    lightIcon.classList.remove('hidden');
                    darkIcon.classList.add('hidden');
                }
            });
        });

        // Submenu toggle function
        function toggleSubmenu(submenuId) {
            const submenu = document.getElementById(submenuId);
            const chevron = document.getElementById(submenuId.replace('-submenu', '-chevron'));
            
            if (submenu.classList.contains('hidden')) {
                submenu.classList.remove('hidden');
                chevron.style.transform = 'rotate(180deg)';
            } else {
                submenu.classList.add('hidden');
                chevron.style.transform = 'rotate(0deg)';
            }
        }
    </script>
</body>
</html>
