<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('home.page_title') }}</title>
    
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
                        sans: ['Inter', 'Bangla', 'system-ui', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.5s ease-out',
                        'pulse': 'pulse 0.6s ease-in-out',
                        'float': 'float 3s ease-in-out infinite',
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
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' },
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
        
        /* Partner logos slider animation */
        @keyframes scroll {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }
        
        .animate-scroll {
            animation: scroll 30s linear infinite;
        }
        
        .animate-scroll:hover {
            animation-play-state: paused;
        }
        
        /* Language Dropdown Styles */
        .language-dropdown {
            transition: all 0.2s ease-in-out;
        }
        
        #language-menu {
            transition: all 0.2s ease-in-out;
        }
        
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
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    
    @php
        $pageName = 'home';
        $showSupport = true;
        $showActionButtons = true;
        $showFullFooter = true;
    @endphp
    
    @include('partials.header', ['headerClass' => 'bg-white/80 backdrop-blur-sm border-b border-gray-200/50'])

    <!-- Main Content -->
    <main class="relative z-0">
        <!-- Hero Section -->
        <section class="pt-20 pb-16 px-6">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-8">
                        <div class="space-y-4">
                            <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">
                                {{ __('home.hero_title') }}
                            </h1>
                            <p class="text-xl lg:text-2xl text-gray-600 leading-relaxed">
                                {{ __('home.hero_subtitle') }}
                            </p>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('auth.login') }}" class="bg-primary-600 text-white px-8 py-4 rounded-xl font-semibold hover:bg-primary-700 transition-colors text-center">
                                {{ __('home.start_now') }}
                            </a>
                            <a href="{{ route('about') }}" class="border-2 border-primary-600 text-primary-600 px-8 py-4 rounded-xl font-semibold hover:bg-primary-50 transition-colors text-center">
                                {{ __('home.learn_more') }}
                            </a>
                        </div>
                        
                        <div class="flex items-center space-x-8 pt-6">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-primary-600">500+</div>
                                <div class="text-sm text-gray-600">{{ __('home.businesses_served') }}</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-primary-600">99.9%</div>
                                <div class="text-sm text-gray-600">{{ __('home.uptime') }}</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-primary-600">24/7</div>
                                <div class="text-sm text-gray-600">{{ __('home.support') }}</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <div class="bg-gradient-to-br from-primary-500 to-primary-700 rounded-3xl p-8 text-white animate-float">
                            <div class="text-center">
                                <i class="fas fa-chart-line text-6xl mb-6 opacity-80"></i>
                                <h3 class="text-2xl font-bold mb-4">{{ __('home.growth_title') }}</h3>
                                <p class="text-primary-100">{{ __('home.growth_desc') }}</p>
                            </div>
                        </div>
                        <div class="absolute -bottom-6 -right-6 bg-white rounded-2xl p-6 shadow-xl">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-check text-white text-xl"></i>
                                </div>
                                <div>
                                    <div class="font-bold text-gray-900">{{ __('home.trusted_by') }}</div>
                                    <div class="text-sm text-gray-600">{{ __('home.local_businesses') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Partners Section -->
        <section class="py-16 px-6 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                        {{ __('home.partners_title') }}
                    </h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        {{ __('home.partners_subtitle') }}
                    </p>
                </div>
                
                <!-- Partner Logos Slider -->
                <div class="relative overflow-hidden">
                    <div class="flex space-x-16 animate-scroll">
                        <!-- Partner Logo 1 -->
                        <div class="flex-shrink-0 w-32 h-20 bg-white rounded-lg shadow-sm border border-gray-200 flex items-center justify-center hover:shadow-md transition-shadow p-2">
                            <img src="{{ asset('img/partners/1.png') }}" alt="Partner 1" class="max-w-full max-h-full object-contain">
                        </div>
                        
                        <!-- Partner Logo 2 -->
                        <div class="flex-shrink-0 w-32 h-20 bg-white rounded-lg shadow-sm border border-gray-200 flex items-center justify-center hover:shadow-md transition-shadow p-2">
                            <img src="{{ asset('img/partners/2.png') }}" alt="Partner 2" class="max-w-full max-h-full object-contain">
                        </div>
                        
                        <!-- Partner Logo 3 -->
                        <div class="flex-shrink-0 w-32 h-20 bg-white rounded-lg shadow-sm border border-gray-200 flex items-center justify-center hover:shadow-md transition-shadow p-2">
                            <img src="{{ asset('img/partners/3.png') }}" alt="Partner 3" class="max-w-full max-h-full object-contain">
                        </div>
                        
                        <!-- Partner Logo 4 -->
                        <div class="flex-shrink-0 w-32 h-20 bg-white rounded-lg shadow-sm border border-gray-200 flex items-center justify-center hover:shadow-md transition-shadow p-2">
                            <img src="{{ asset('img/partners/4.png') }}" alt="Partner 4" class="max-w-full max-h-full object-contain">
                        </div>
                        
                        <!-- Duplicate logos for seamless loop -->
                        <div class="flex-shrink-0 w-32 h-20 bg-white rounded-lg shadow-sm border border-gray-200 flex items-center justify-center hover:shadow-md transition-shadow p-2">
                            <img src="{{ asset('img/partners/1.png') }}" alt="Partner 1" class="max-w-full max-h-full object-contain">
                        </div>
                        
                        <div class="flex-shrink-0 w-32 h-20 bg-white rounded-lg shadow-sm border border-gray-200 flex items-center justify-center hover:shadow-md transition-shadow p-2">
                            <img src="{{ asset('img/partners/2.png') }}" alt="Partner 2" class="max-w-full max-h-full object-contain">
                        </div>
                        
                        <div class="flex-shrink-0 w-32 h-20 bg-white rounded-lg shadow-sm border border-gray-200 flex items-center justify-center hover:shadow-md transition-shadow p-2">
                            <img src="{{ asset('img/partners/3.png') }}" alt="Partner 3" class="max-w-full max-h-full object-contain">
                        </div>
                        
                        <div class="flex-shrink-0 w-32 h-20 bg-white rounded-lg shadow-sm border border-gray-200 flex items-center justify-center hover:shadow-md transition-shadow p-2">
                            <img src="{{ asset('img/partners/5.png') }}" alt="Partner 4" class="max-w-full max-h-full object-contain">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-16 px-6 bg-white/50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                        {{ __('home.features_title') }}
                    </h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        {{ __('home.features_subtitle') }}
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-chart-line text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('home.real_time_analytics') }}</h3>
                        <p class="text-gray-600">{{ __('home.real_time_analytics_desc') }}</p>
                    </div>
                    
                    <!-- Feature 2 -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-mobile-alt text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('home.mobile_ready') }}</h3>
                        <p class="text-gray-600">{{ __('home.mobile_ready_desc') }}</p>
                    </div>
                    
                    <!-- Feature 3 -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-shield-alt text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('home.secure_reliable') }}</h3>
                        <p class="text-gray-600">{{ __('home.secure_reliable_desc') }}</p>
                    </div>
                    
                    <!-- Feature 4 -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-users text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('home.team_collaboration') }}</h3>
                        <p class="text-gray-600">{{ __('home.team_collaboration_desc') }}</p>
                    </div>
                    
                    <!-- Feature 5 -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-clock text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('home.real_time_updates') }}</h3>
                        <p class="text-gray-600">{{ __('home.real_time_updates_desc') }}</p>
                    </div>
                    
                    <!-- Feature 6 -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-globe text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('home.bangladesh_localized') }}</h3>
                        <p class="text-gray-600">{{ __('home.bangladesh_localized_desc') }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Why Choose Us Section -->
        <section class="py-16 px-6">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6">
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">
                            {{ __('home.why_choose_title') }}
                        </h2>
                        <p class="text-lg text-gray-600 leading-relaxed">
                            {{ __('home.why_choose_desc') }}
                        </p>
                        
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center mt-1">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">{{ __('home.local_expertise_title') }}</h4>
                                    <p class="text-gray-600 text-sm">{{ __('home.local_expertise_desc') }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3">
                                <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center mt-1">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">{{ __('home.cost_effective_title') }}</h4>
                                    <p class="text-gray-600 text-sm">{{ __('home.cost_effective_desc') }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3">
                                <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center mt-1">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">{{ __('home.24_7_support_title') }}</h4>
                                    <p class="text-gray-600 text-sm">{{ __('home.24_7_support_desc') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-3xl p-8 text-white">
                            <div class="text-center">
                                <i class="fas fa-award text-6xl mb-6 opacity-80"></i>
                                <h3 class="text-2xl font-bold mb-4">{{ __('home.award_title') }}</h3>
                                <p class="text-green-100">{{ __('home.award_desc') }}</p>
                            </div>
                        </div>
                        <div class="absolute -top-6 -left-6 bg-white rounded-2xl p-6 shadow-xl">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-primary-600">2024</div>
                                <div class="text-sm text-gray-600">{{ __('home.best_platform') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Us Section -->
        <section class="py-16 px-6 bg-white/50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                        {{ __('home.about_us_title') }}
                    </h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        {{ __('home.about_us_subtitle') }}
                    </p>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6">
                        <h3 class="text-2xl font-bold text-gray-900">
                            {{ __('home.our_story_title') }}
                        </h3>
                        <p class="text-gray-600 leading-relaxed">
                            {{ __('home.our_story_desc') }}
                        </p>
                        
                        <div class="grid grid-cols-2 gap-6 pt-6">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-primary-600">2018</div>
                                <div class="text-sm text-gray-600">{{ __('home.founded') }}</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-primary-600">6+</div>
                                <div class="text-sm text-gray-600">{{ __('home.years_experience') }}</div>
                            </div>
                        </div>
                        
                        <a href="{{ route('about') }}" class="inline-flex items-center text-primary-600 hover:text-primary-700 font-medium transition-colors">
                            {{ __('home.read_more') }}
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                    
                    <div class="relative">
                        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-3xl p-8 text-white">
                            <div class="text-center">
                                <i class="fas fa-users text-6xl mb-6 opacity-80"></i>
                                <h3 class="text-2xl font-bold mb-4">{{ __('home.team_title') }}</h3>
                                <p class="text-blue-100">{{ __('home.team_desc') }}</p>
                            </div>
                        </div>
                        <div class="absolute -bottom-6 -right-6 bg-white rounded-2xl p-6 shadow-xl">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-blue-600">15+</div>
                                <div class="text-sm text-gray-600">{{ __('home.experts') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-16 px-6">
            <div class="max-w-7xl mx-auto text-center">
                <div class="bg-gradient-to-r from-primary-600 to-primary-700 rounded-3xl p-12 text-white">
                    <h2 class="text-3xl lg:text-4xl font-bold mb-6">
                        {{ __('home.cta_title') }}
                    </h2>
                    <p class="text-xl text-primary-100 mb-8 max-w-2xl mx-auto">
                        {{ __('home.cta_desc') }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('auth.login') }}" class="bg-white text-primary-600 px-8 py-4 rounded-xl font-semibold hover:bg-gray-100 transition-colors">
                            {{ __('home.get_started') }}
                        </a>
                        <a href="{{ route('about') }}" class="border-2 border-white text-white px-8 py-4 rounded-xl font-semibold hover:bg-white hover:text-primary-600 transition-colors">
                            {{ __('home.learn_more') }}
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('partials.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    @include('partials.language-dropdown')
</body>
</html>
