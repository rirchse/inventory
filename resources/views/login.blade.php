<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('login.title') }}</title>
    
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
                        sans: ['Inter', 'Noto Sans Bengali', 'system-ui', 'sans-serif'],
                    },
                                         animation: {
                         'fade-in': 'fadeIn 0.5s ease-in-out',
                         'slide-up': 'slideUp 0.5s ease-out',
                         'pulse': 'pulse 0.6s ease-in-out',
                     },
                     keyframes: {
                         fadeIn: {
                             '0%': { opacity: '0' },
                             '100%': { opacity: '1' },
                         },
                         slideUp: {
                             '0%': { transform: 'translateY(20px)', opacity: '0' },
                             '100%': { transform: 'translateY(0)', opacity: '1' },
                         },
                         pulse: {
                             '0%': { transform: 'scale(1)' },
                             '50%': { transform: 'scale(1.1)' },
                             '100%': { transform: 'scale(1)' },
                         }
                     }
                }
            }
        }
    </script>
    
    <style>
        .bg-grid-pattern {
            background-image: 
                linear-gradient(rgba(59, 130, 246, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(59, 130, 246, 0.1) 1px, transparent 1px);
            background-size: 20px 20px;
        }
        
        /* Bengali font support */
        .lang-bn {
            font-family: 'Bangla', 'Inter', sans-serif;
        }
        
        /* Language Dropdown Styles */
        .language-dropdown {
            transition: all 0.2s ease-in-out;
        }
        
        #language-menu {
            transition: all 0.2s ease-in-out;
        }
        
        #language-menu.visible {
            opacity: 1 !important;
            visibility: visible !important;
            transform: scale(1) !important;
        }
        
        #language-menu:not(.visible) {
            opacity: 0 !important;
            visibility: hidden !important;
            transform: scale(0.95) !important;
        }
        
        /* Ensure dropdown is always on top */
        #language-dropdown {
            position: relative;
            z-index: 9999;
        }
        
        /* Force dropdown menu to be above everything */
        #language-menu {
            position: absolute;
            z-index: 9999 !important;
            pointer-events: auto;
        }
        
        /* When visible, ensure it's clickable */
        #language-menu.visible {
            pointer-events: auto !important;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-primary-50 via-white to-secondary-50 min-h-screen font-sans {{ app()->getLocale() === 'bn' ? 'lang-bn' : '' }}">
    @php
        $pageName = 'home';
        $showSupport = true;
        $showActionButtons = true;
        $showFullFooter = true;
    @endphp
    
    @include('partials.header')
    
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-grid-pattern opacity-5 -z-10"></div>

    <!-- Main Content -->
    <main class="relative z-0 flex items-center justify-center min-h-screen px-4 py-12">
        <div class="w-full max-w-6xl">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                
                <!-- Left Side - Features & Information -->
                <div class="text-center lg:text-left space-y-8">
                    <!-- Main Heading -->
                    <div class="space-y-4">
                        <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                            {{ __('login.manage_inventory_pro') }}
                        </h1>
                        <p class="text-xl text-gray-600 leading-relaxed max-w-lg mx-auto lg:mx-0">
                            {{ __('login.streamline_business') }}
                        </p>
                    </div>

                    <!-- Feature Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-2xl mx-auto lg:mx-0">
                        <!-- Feature 1 -->
                        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mb-4 mx-auto lg:mx-0">
                                <i class="fas fa-chart-line text-white text-xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('login.real_time_analytics') }}</h3>
                            <p class="text-gray-600 text-sm">{{ __('login.real_time_analytics_desc') }}</p>
                        </div>

                        <!-- Feature 2 -->
                        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-4 mx-auto lg:mx-0">
                                <i class="fas fa-mobile-alt text-white text-xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('login.mobile_ready') }}</h3>
                            <p class="text-gray-600 text-sm">{{ __('login.mobile_ready_desc') }}</p>
                        </div>

                        <!-- Feature 3 -->
                        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mb-4 mx-auto lg:mx-0">
                                <i class="fas fa-shield-alt text-white text-xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('login.secure_reliable') }}</h3>
                            <p class="text-gray-600 text-sm">{{ __('login.secure_reliable_desc') }}</p>
                        </div>

                        <!-- Feature 4 -->
                        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mb-4 mx-auto lg:mx-0">
                                <i class="fas fa-users text-white text-xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('login.team_collaboration') }}</h3>
                            <p class="text-gray-600 text-sm">{{ __('login.team_collaboration_desc') }}</p>
                        </div>
                    </div>

                    <!-- Trust Indicators -->
                    <div class="pt-6 border-t border-gray-200">
                        <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start space-y-4 sm:space-y-0 sm:space-x-8">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="text-sm text-gray-600">{{ __('login.local_businesses') }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="text-sm text-gray-600">{{ __('login.support_24_7') }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="text-sm text-gray-600">{{ __('login.uptime_99_9') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Login Form -->
                <div class="flex justify-center lg:justify-end">
                    <div class="w-full max-w-md">
                        <!-- Login Card -->
                        <div class="bg-white/95 backdrop-blur-sm rounded-3xl shadow-2xl p-8 animate-slide-up border border-white/20">
                            <!-- Header -->
                            <div class="text-center mb-8">
                                <div class="w-20 h-20 bg-gradient-to-br from-primary-500 to-primary-600 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                                    <i class="fas fa-user-lock text-white text-3xl"></i>
                                </div>
                                <h2 class="text-3xl font-bold text-gray-900 mb-3">{{ __('login.welcome_back') }}</h2>
                                <p class="text-gray-600 text-lg">{{ __('login.sign_in_dashboard') }}</p>
                            </div>

                            <!-- Messages -->
                            @include('partials.messages')
                            
                            <!-- Language Change Success Message -->
                            @if(session('language_changed'))
                                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl">
                                    <div class="flex items-center">
                                        <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                        <div>
                                            <p class="text-sm font-medium text-green-800">
                                                @if(session('language_changed') === 'bn')
                                                    ভাষা সফলভাবে পরিবর্তন করা হয়েছে!
                                                @else
                                                    Language changed successfully!
                                                @endif
                                            </p>
                                            <p class="text-xs text-green-600 mt-1">
                                                @if(session('language_changed') === 'bn')
                                                    এখন আপনি বাংলায় সিস্টেম ব্যবহার করতে পারেন
                                                @else
                                                    You can now use the system in English
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- Login Form -->
                            <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                                @csrf
                                
                                <!-- Email Field -->
                                <div class="space-y-2">
                                    <label for="email" class="block text-sm font-semibold text-gray-700">
                                        {{ __('login.email_address') }}
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-envelope text-gray-400"></i>
                                        </div>
                                        <input 
                                            type="email" 
                                            id="email"
                                            name="email" 
                                            class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all duration-300 bg-white hover:bg-gray-50 placeholder-gray-400 @error('email') border-red-300 focus:ring-red-100 focus:border-red-500 @enderror"
                                            placeholder="{{ __('login.enter_email') }}"
                                            value="{{ old('email') }}"
                                            required
                                            autocomplete="email"
                                        >
                                    </div>
                                    @error('email')
                                        <p class="mt-1 text-sm text-red-600 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Password Field -->
                                <div class="space-y-2">
                                    <label for="password" class="block text-sm font-semibold text-gray-700">
                                        {{ __('login.password') }}
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-lock text-gray-400"></i>
                                        </div>
                                        <input 
                                            type="password" 
                                            id="password"
                                            name="password" 
                                            class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all duration-300 bg-white hover:bg-gray-50 placeholder-gray-400 @error('password') border-red-300 focus:ring-red-100 focus:border-red-500 @enderror"
                                            placeholder="{{ __('login.enter_password') }}"
                                            required
                                            autocomplete="current-password"
                                        >
                                    </div>
                                    @error('password')
                                        <p class="mt-1 text-sm text-red-600 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Remember Me & Forgot Password -->
                                <div class="flex items-center justify-between">
                                    <label class="flex items-center group cursor-pointer">
                                        <div class="relative">
                                            <input type="checkbox" class="sr-only peer">
                                            <div class="w-5 h-5 border-2 border-gray-300 rounded-md peer-checked:bg-primary-500 peer-checked:border-primary-500 transition-all duration-200 peer-checked:ring-4 peer-checked:ring-primary-100 group-hover:border-primary-400">
                                                <svg class="w-3 h-3 text-white absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-0 peer-checked:opacity-100 transition-opacity duration-200" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <span class="ml-3 text-sm text-gray-600 group-hover:text-gray-700 transition-colors">{{ __('login.remember_me') }}</span>
                                    </label>
                                    <a href="#" class="text-sm text-primary-600 hover:text-primary-700 font-medium transition-colors hover:underline">
                                        {{ __('login.forgot_password') }}
                                    </a>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="w-full bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-[1.02] focus:outline-none focus:ring-4 focus:ring-primary-200 shadow-lg hover:shadow-xl">
                                    <i class="fas fa-sign-in-alt mr-2"></i>
                                    {{ __('login.sign_in') }}
                                </button>
                            </form>

                            <!-- Divider -->
                            <div class="relative my-6">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-gray-300"></div>
                                </div>
                                <div class="relative flex justify-center text-sm">
                                    <span class="px-2 bg-white text-gray-500">{{ __('login.or_continue_with') }}</span>
                                </div>
                            </div>

                            <!-- Social Login -->
                            <div class="grid grid-cols-2 gap-3">
                                <button class="flex items-center justify-center px-4 py-3 border-2 border-gray-200 rounded-xl hover:border-gray-300 hover:bg-gray-50 transition-all duration-200 transform hover:scale-105 group">
                                    <i class="fab fa-google text-red-500 mr-2 group-hover:scale-110 transition-transform"></i>
                                    <span class="text-sm font-medium text-gray-700">Google</span>
                                </button>
                                <button class="flex items-center justify-center px-4 py-3 border-2 border-gray-200 rounded-xl hover:border-gray-300 hover:bg-gray-50 transition-all duration-200 transform hover:scale-105 group">
                                    <i class="fab fa-microsoft text-blue-500 mr-2 group-hover:scale-110 transition-transform"></i>
                                    <span class="text-sm font-medium text-gray-700">Microsoft</span>
                                </button>
                            </div>

                            <!-- Footer -->
                            <div class="text-center mt-8">
                                <p class="text-sm text-gray-600">
                                    {{ __('login.dont_have_account') }} 
                                    <a href="#" class="text-primary-600 hover:text-primary-700 font-semibold transition-colors hover:underline">
                                        {{ __('login.contact_admin') }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('partials.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    @include('partials.language-dropdown')
</body>
</html>