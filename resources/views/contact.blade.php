<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $pageName = 'contact';
        $showSupport = true;
        $showActionButtons = true;
        $showFullFooter = true;
    @endphp

    <title>{{ __($pageName . '.page_title') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bengali Font Support -->
    <link href="https://fonts.maateen.me/bangla/font.css" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
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
        /* Background pattern */
        .bg-grid-pattern {
            background-image: 
                linear-gradient(rgba(0,0,0,0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0,0,0,0.1) 1px, transparent 1px);
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
<body class="font-sans antialiased {{ app()->getLocale() === 'bn' ? 'lang-bn' : '' }}">
    @include('partials.header')
    
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-grid-pattern opacity-5 -z-10"></div>
    
    <!-- Main Content -->
    <main class="relative z-10">
        <!-- Hero Section -->
        <section class="pt-32 pb-20 px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    {{ __($pageName . '.hero_title') }}
                </h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    {{ __($pageName . '.hero_subtitle') }}
                </p>
            </div>
        </section>

        <!-- Contact Form & Info Section -->
        <section class="pb-20 px-6">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Contact Form -->
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">
                            {{ __($pageName . '.form_title') }}
                        </h2>
                        
                        <form class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">
                                        {{ __($pageName . '.first_name') }}
                                    </label>
                                    <input type="text" id="first_name" name="first_name" required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">
                                        {{ __($pageName . '.last_name') }}
                                    </label>
                                    <input type="text" id="last_name" name="last_name" required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                </div>
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ __($pageName . '.email') }}
                                </label>
                                <input type="email" id="email" name="email" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                            </div>
                            
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ __($pageName . '.phone') }}
                                </label>
                                <input type="tel" id="phone" name="phone"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                            </div>
                            
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ __($pageName . '.subject') }}
                                </label>
                                <select id="subject" name="subject" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                    <option value="">{{ __($pageName . '.select_subject') }}</option>
                                    <option value="general">{{ __($pageName . '.general_inquiry') }}</option>
                                    <option value="support">{{ __($pageName . '.technical_support') }}</option>
                                    <option value="sales">{{ __($pageName . '.sales_inquiry') }}</option>
                                    <option value="partnership">{{ __($pageName . '.partnership') }}</option>
                                    <option value="other">{{ __($pageName . '.other') }}</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ __($pageName . '.message') }}
                                </label>
                                <textarea id="message" name="message" rows="5" required
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                                          placeholder="{{ __($pageName . '.message_placeholder') }}"></textarea>
                            </div>
                            
                            <button type="submit" 
                                    class="w-full bg-primary-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-primary-700 transition-colors">
                                {{ __($pageName . '.send_message') }}
                            </button>
                        </form>
                    </div>
                    
                    <!-- Contact Information -->
                    <div class="space-y-8">
                        <!-- Contact Details -->
                        <div class="bg-white rounded-2xl shadow-xl p-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-6">
                                {{ __($pageName . '.contact_details') }}
                            </h3>
                            
                            <div class="space-y-4">
                                <div class="flex items-start space-x-4">
                                    <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-map-marker-alt text-primary-600"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">{{ __($pageName . '.address_title') }}</h4>
                                        <p class="text-gray-600">{{ __($pageName . '.address') }}</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start space-x-4">
                                    <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-phone text-primary-600"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">{{ __($pageName . '.phone_title') }}</h4>
                                        <p class="text-gray-600">{{ __($pageName . '.phone') }}</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start space-x-4">
                                    <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-envelope text-primary-600"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">{{ __($pageName . '.email_title') }}</h4>
                                        <p class="text-gray-600">{{ __($pageName . '.email') }}</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start space-x-4">
                                    <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-clock text-primary-600"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">{{ __($pageName . '.business_hours_title') }}</h4>
                                        <p class="text-gray-600">{{ __($pageName . '.business_hours') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Social Media -->
                        <div class="bg-white rounded-2xl shadow-xl p-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-6">
                                {{ __($pageName . '.follow_us') }}
                            </h3>
                            
                            <div class="flex space-x-4">
                                <a href="#" class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center hover:bg-primary-200 transition-colors">
                                    <i class="fab fa-facebook-f text-primary-600"></i>
                                </a>
                                <a href="#" class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center hover:bg-primary-200 transition-colors">
                                    <i class="fab fa-twitter text-primary-600"></i>
                                </a>
                                <a href="#" class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center hover:bg-primary-200 transition-colors">
                                    <i class="fab fa-linkedin-in text-primary-600"></i>
                                </a>
                                <a href="#" class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center hover:bg-primary-200 transition-colors">
                                    <i class="fab fa-instagram text-primary-600"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-20 px-6 bg-gray-50">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">
                        {{ __($pageName . '.faq_title') }}
                    </h2>
                    <p class="text-lg text-gray-600">
                        {{ __($pageName . '.faq_subtitle') }}
                    </p>
                </div>
                
                <div class="space-y-6">
                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">
                            {{ __($pageName . '.faq_1_question') }}
                        </h3>
                        <p class="text-gray-600">
                            {{ __($pageName . '.faq_1_answer') }}
                        </p>
                    </div>
                    
                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">
                            {{ __($pageName . '.faq_2_question') }}
                        </h3>
                        <p class="text-gray-600">
                            {{ __($pageName . '.faq_2_answer') }}
                        </p>
                    </div>
                    
                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">
                            {{ __($pageName . '.faq_3_question') }}
                        </h3>
                        <p class="text-gray-600">
                            {{ __($pageName . '.faq_3_answer') }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('partials.footer')
    
    @include('partials.language-dropdown')
</body>
</html>
