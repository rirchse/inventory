<!-- Footer -->
<footer class="relative z-0 {{ isset($footerClass) ? $footerClass : 'text-center text-gray-500 text-sm' }}">
    @if(isset($showFullFooter) && $showFullFooter)
        <div class="bg-gray-900 text-white pt-16 pb-0 px-6">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-5 gap-8 mb-12">
                    <!-- Company Info -->
                    <div class="col-span-1 md:col-span-2">
                        <div class="flex items-center space-x-3 mb-6">
                            <div class="w-10 h-10 bg-primary-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-boxes text-white text-xl"></i>
                            </div>
                            <span class="text-2xl font-bold">{{ __($pageName . '.app_name') }}</span>
                        </div>
                        <p class="text-gray-400 mb-6 max-w-md text-left">{{ __($pageName . '.footer_description') }}</p>
                    </div>
                    
                    <!-- Services -->
                    <div>
                        <h3 class="text-lg font-semibold mb-6 text-left">{{ __($pageName . '.services') }}</h3>
                        <ul class="space-y-3 text-left">
                            <li><a href="#" class="text-gray-300 hover:text-white transition-colors">{{ __($pageName . '.inventory_management') }}</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white transition-colors">{{ __($pageName . '.sales_tracking') }}</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white transition-colors">{{ __($pageName . '.purchase_management') }}</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white transition-colors">{{ __($pageName . '.reporting_analytics') }}</a></li>
                        </ul>
                    </div>
                    
                    <!-- Quick Links -->
                    <div>
                        <h3 class="text-lg font-semibold mb-6 text-left">{{ __($pageName . '.quick_links') }}</h3>
                        <ul class="space-y-3 text-left">
                            <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white transition-colors">{{ __($pageName . '.home') }}</a></li>
                            <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-white transition-colors">{{ __($pageName . '.about') }}</a></li>
                            <li><a href="{{ route('pricing') }}" class="text-gray-300 hover:text-white transition-colors">{{ __($pageName . '.pricing') }}</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white transition-colors">{{ __($pageName . '.features') }}</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white transition-colors">{{ __($pageName . '.contact') }}</a></li>
                        </ul>
                    </div>
                    
                    <!-- Contact Info -->
                    <div>
                        <h3 class="text-lg font-semibold mb-6 text-left">{{ __($pageName . '.contact_info') }}</h3>
                        <ul class="space-y-3 text-left">
                            <li class="flex items-center space-x-3 text-gray-300">
                                <i class="fas fa-map-marker-alt text-primary-400"></i>
                                <span>{{ __($pageName . '.address') }}</span>
                            </li>
                            <li class="flex items-center space-x-3 text-gray-300">
                                <i class="fas fa-phone text-primary-400"></i>
                                <span>{{ __($pageName . '.phone') }}</span>
                            </li>
                            <li class="flex items-center space-x-3 text-gray-300">
                                <i class="fas fa-envelope text-primary-400"></i>
                                <span>{{ __($pageName . '.email') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="border-t border-gray-800 py-5 text-center">
                    <p class="text-gray-400">
                        &copy; {{ date('Y') }} {{ __($pageName . '.copyright') }} | {{ __($pageName . '.built_for_bangladesh') }}
                    </p>
                </div>
            </div>
        </div>
    @else
        <div class="text-center pb-0">
            <p>&copy; {{ date('Y') }} {{ __($pageName . '.copyright') }}</p>
            <p class="mt-1">{{ __($pageName . '.built_for_bangladesh') }}</p>
        </div>
    @endif
</footer>
