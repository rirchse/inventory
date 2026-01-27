<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('pricing.page_title') }} - Inventory Management</title>
    
    <!-- Tailwind CSS -->
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
                        'bangla': ['Bangla', 'Noto Sans Bengali', 'sans-serif'],
                        'sans': ['Inter', 'Bangla', 'Noto Sans Bengali', 'sans-serif']
                    },
                    animation: {
                        'pulse': 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    }
                }
            }
        }
    </script>
    
    <!-- Bengali Font Support -->
    <link href="https://fonts.maateen.me/bangla/font.css" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
                    <style>
                    .font-bangla { font-family: 'Bangla', 'Noto Sans Bengali', sans-serif; }
                    
                    /* Custom animations */
                    @keyframes float {
                        0%, 100% { transform: translateY(0px); }
                        50% { transform: translateY(-10px); }
                    }
                    .animate-float { animation: float 3s ease-in-out infinite; }
                    
                    /* Pricing card hover effects */
                    .pricing-card {
                        transition: all 0.3s ease;
                    }
                    .pricing-card:hover {
                        transform: translateY(-8px);
                        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
                    }
                    
                    /* Feature list styling */
                    .feature-list li {
                        position: relative;
                        padding-left: 1.5rem;
                    }
                    .feature-list li::before {
                        content: '✓';
                        position: absolute;
                        left: 0;
                        color: #10b981;
                        font-weight: bold;
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
<body class="bg-gray-50 font-sans">
    @php
        $pageName = 'pricing';
        $showActionButtons = true;
    @endphp
    
    @include('partials.header', ['headerClass' => 'bg-white/80 backdrop-blur-sm border-b border-gray-200/50'])

    <!-- Main Content -->
    <main class="z-0">
        <!-- Hero Section -->
        <section class="relative py-20 bg-gradient-to-br from-primary-50 via-white to-blue-50 overflow-hidden">
            <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
            <div class="relative max-w-7xl mx-auto px-6 text-center">
                <div class="mb-8">
                    <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6">
                        {{ __('pricing.hero_title') }}
                    </h1>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                        {{ __('pricing.hero_subtitle') }}
                    </p>
                </div>
                
                <!-- Pricing Toggle -->
                <div class="flex items-center justify-center space-x-4 mb-12">
                    <span class="text-gray-600">{{ __('pricing.monthly') }}</span>
                    <div class="relative">
                        <input type="checkbox" id="billing-toggle" class="sr-only">
                        <label for="billing-toggle" class="flex items-center cursor-pointer">
                            <div class="w-14 h-7 bg-gray-300 rounded-full p-1 transition-colors duration-200">
                                <div class="w-5 h-5 bg-white rounded-full transition-transform duration-200 transform translate-x-0" id="toggle-slider"></div>
                            </div>
                        </label>
                    </div>
                    <span class="text-gray-600">{{ __('pricing.yearly') }} <span class="text-primary-600 font-medium">({{ __('pricing.save_20') }})</span></span>
                </div>
            </div>
        </section>

        <!-- Pricing Cards Section -->
        <section class="py-20 px-6">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">{{ __('pricing.choose_plan') }}</h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">{{ __('pricing.choose_plan_subtitle') }}</p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8 lg:gap-12">
                    <!-- Basic Plan - 500 Taka -->
                    <div class="pricing-card bg-white rounded-2xl shadow-lg border border-gray-200 p-8 relative">
                        <div class="text-center mb-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ __('pricing.basic_plan') }}</h3>
                            <p class="text-gray-600 mb-6">{{ __('pricing.basic_description') }}</p>
                            <div class="mb-6">
                                <span class="text-4xl font-bold text-gray-900">৳</span>
                                <span class="text-6xl font-bold text-gray-900" id="basic-price">500</span>
                                <span class="text-xl text-gray-600">/{{ __('pricing.month') }}</span>
                            </div>
                            <a href="#" class="w-full bg-gray-100 text-gray-700 py-3 px-6 rounded-lg font-medium hover:bg-gray-200 transition-colors inline-block">
                                {{ __('pricing.get_started') }}
                            </a>
                        </div>
                        
                        <div class="space-y-4">
                            <h4 class="font-semibold text-gray-900 mb-4">{{ __('pricing.whats_included') }}</h4>
                            <ul class="feature-list space-y-3 text-gray-600">
                                <li>{{ __('pricing.basic_features.up_to_100_products') }}</li>
                                <li>{{ __('pricing.basic_features.basic_inventory_tracking') }}</li>
                                <li>{{ __('pricing.basic_features.sales_reports') }}</li>
                                <li>{{ __('pricing.basic_features.email_support') }}</li>
                                <li>{{ __('pricing.basic_features.mobile_app') }}</li>
                                <li>{{ __('pricing.basic_features.1_user') }}</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Professional Plan - 1000 Taka -->
                    <div class="pricing-card bg-white rounded-2xl shadow-xl border-2 border-primary-500 p-8 relative transform scale-105">
                        <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                            <span class="bg-primary-600 text-white px-4 py-2 rounded-full text-sm font-medium">{{ __('pricing.most_popular') }}</span>
                        </div>
                        
                        <div class="text-center mb-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ __('pricing.professional_plan') }}</h3>
                            <p class="text-gray-600 mb-6">{{ __('pricing.professional_description') }}</p>
                            <div class="mb-6">
                                <span class="text-4xl font-bold text-gray-900">৳</span>
                                <span class="text-6xl font-bold text-gray-900" id="professional-price">1000</span>
                                <span class="text-xl text-gray-600">/{{ __('pricing.month') }}</span>
                            </div>
                            <a href="#" class="w-full bg-primary-600 text-white py-3 px-6 rounded-lg font-medium hover:bg-primary-700 transition-colors inline-block">
                                {{ __('pricing.get_started') }}
                            </a>
                        </div>
                        
                        <div class="space-y-4">
                            <h4 class="font-semibold text-gray-900 mb-4">{{ __('pricing.whats_included') }}</h4>
                            <ul class="feature-list space-y-3 text-gray-600">
                                <li>{{ __('pricing.professional_features.up_to_1000_products') }}</li>
                                <li>{{ __('pricing.professional_features.advanced_inventory_tracking') }}</li>
                                <li>{{ __('pricing.professional_features.detailed_analytics') }}</li>
                                <li>{{ __('pricing.professional_features.priority_support') }}</li>
                                <li>{{ __('pricing.professional_features.api_access') }}</li>
                                <li>{{ __('pricing.professional_features.up_to_5_users') }}</li>
                                <li>{{ __('pricing.professional_features.barcode_support') }}</li>
                                <li>{{ __('pricing.professional_features.export_reports') }}</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Enterprise Plan - 1500 Taka -->
                    <div class="pricing-card bg-white rounded-2xl shadow-lg border border-gray-200 p-8 relative">
                        <div class="text-center mb-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ __('pricing.enterprise_plan') }}</h3>
                            <p class="text-gray-600 mb-6">{{ __('pricing.enterprise_description') }}</p>
                            <div class="mb-6">
                                <span class="text-4xl font-bold text-gray-900">৳</span>
                                <span class="text-6xl font-bold text-gray-900" id="enterprise-price">1500</span>
                                <span class="text-xl text-gray-600">/{{ __('pricing.month') }}</span>
                            </div>
                            <a href="#" class="w-full bg-gray-100 text-gray-700 py-3 px-6 rounded-lg font-medium hover:bg-gray-200 transition-colors inline-block">
                                {{ __('pricing.get_started') }}
                            </a>
                        </div>
                        
                        <div class="space-y-4">
                            <h4 class="font-semibold text-gray-900 mb-4">{{ __('pricing.whats_included') }}</h4>
                            <ul class="feature-list space-y-3 text-gray-600">
                                <li>{{ __('pricing.enterprise_features.unlimited_products') }}</li>
                                <li>{{ __('pricing.enterprise_features.multi_location_support') }}</li>
                                <li>{{ __('pricing.enterprise_features.advanced_analytics') }}</li>
                                <li>{{ __('pricing.enterprise_features.24_7_support') }}</li>
                                <li>{{ __('pricing.enterprise_features.custom_integrations') }}</li>
                                <li>{{ __('pricing.enterprise_features.unlimited_users') }}</li>
                                <li>{{ __('pricing.enterprise_features.white_label') }}</li>
                                <li>{{ __('pricing.enterprise_features.dedicated_manager') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-20 px-6 bg-gray-50">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">{{ __('pricing.faq_title') }}</h2>
                    <p class="text-xl text-gray-600">{{ __('pricing.faq_subtitle') }}</p>
                </div>
                
                <div class="space-y-6">
                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ __('pricing.faq_1.question') }}</h3>
                        <p class="text-gray-600">{{ __('pricing.faq_1.answer') }}</p>
                    </div>
                    
                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ __('pricing.faq_2.question') }}</h3>
                        <p class="text-gray-600">{{ __('pricing.faq_2.answer') }}</p>
                    </div>
                    
                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ __('pricing.faq_3.question') }}</h3>
                        <p class="text-gray-600">{{ __('pricing.faq_3.answer') }}</p>
                    </div>
                    
                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ __('pricing.faq_4.question') }}</h3>
                        <p class="text-gray-600">{{ __('pricing.faq_4.answer') }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 px-6 bg-primary-600">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl font-bold text-white mb-6">{{ __('pricing.cta_title') }}</h2>
                <p class="text-xl text-primary-100 mb-8">{{ __('pricing.cta_subtitle') }}</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#" class="bg-white text-primary-600 px-8 py-3 rounded-lg font-medium hover:bg-gray-100 transition-colors">
                        {{ __('pricing.start_free_trial') }}
                    </a>
                    <a href="#" class="border-2 border-white text-white px-8 py-3 rounded-lg font-medium hover:bg-white hover:text-primary-600 transition-colors">
                        {{ __('pricing.contact_sales') }}
                    </a>
                </div>
            </div>
        </section>
    </main>

    @include('partials.footer', ['showFullFooter' => true])

    @include('partials.language-dropdown')
    
         <!-- Pricing toggle functionality -->
     <script>
         document.addEventListener('DOMContentLoaded', function() {
             const billingToggle = document.getElementById('billing-toggle');
             const basicPrice = document.getElementById('basic-price');
             const professionalPrice = document.getElementById('professional-price');
             const enterprisePrice = document.getElementById('enterprise-price');
             const toggleSlider = document.getElementById('toggle-slider');
             
             billingToggle.addEventListener('change', function() {
                 if (this.checked) {
                     // Yearly pricing (20% discount)
                     basicPrice.textContent = '400';
                     professionalPrice.textContent = '800';
                     enterprisePrice.textContent = '1200';
                     // Move slider to right
                     toggleSlider.style.transform = 'translateX(28px)';
                     toggleSlider.parentElement.classList.add('bg-primary-600');
                     toggleSlider.parentElement.classList.remove('bg-gray-300');
                 } else {
                     // Monthly pricing
                     basicPrice.textContent = '500';
                     professionalPrice.textContent = '1000';
                     enterprisePrice.textContent = '1500';
                     // Move slider to left
                     toggleSlider.style.transform = 'translateX(0)';
                     toggleSlider.parentElement.classList.remove('bg-primary-600');
                     toggleSlider.parentElement.classList.add('bg-gray-300');
                 }
             });
         });
     </script>
</body>
</html>
