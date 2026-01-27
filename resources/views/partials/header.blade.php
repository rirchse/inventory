<!-- Header -->
<header class="relative z-50 px-6 py-4 {{ isset($headerClass) ? $headerClass : '' }}">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <!-- Logo -->
        <div class="flex items-center space-x-3">
            <a href="{{ route('home') }}" class="flex items-center space-x-3 hover:opacity-80 transition-opacity">
                <div class="w-10 h-10 bg-primary-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-boxes text-white text-xl"></i>
                </div>
                <span class="text-2xl font-bold text-gray-900">{{ __($pageName . '.app_name') }}</span>
            </a>
        </div>
        
        <!-- Navigation & Language Switcher -->
        <div class="flex items-center space-x-6">
            <nav class="hidden md:flex items-center space-x-6">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-primary-600 font-medium border-b-2 border-primary-600 pb-1' : 'text-gray-600 hover:text-primary-600 transition-colors' }}">{{ __($pageName . '.home') }}</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-primary-600 font-medium border-b-2 border-primary-600 pb-1' : 'text-gray-600 hover:text-primary-600 transition-colors' }}">{{ __($pageName . '.about') }}</a>
                <a href="{{ route('pricing') }}" class="{{ request()->routeIs('pricing') ? 'text-primary-600 font-medium border-b-2 border-primary-600 pb-1' : 'text-gray-600 hover:text-primary-600 transition-colors' }}">{{ __($pageName . '.pricing') }}</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-primary-600 font-medium border-b-2 border-primary-600 pb-1' : 'text-gray-600 hover:text-primary-600 transition-colors' }}">{{ __($pageName . '.contact') }}</a>
                @if(isset($showSupport) && $showSupport)
                    <a href="#" class="text-gray-600 hover:text-primary-600 transition-colors">{{ __($pageName . '.support') }}</a>
                @endif
            </nav>
            
            @if(isset($showActionButtons) && $showActionButtons)
                <!-- Action Buttons -->
                <div class="flex items-center space-x-3">
                    @auth
                        <!-- User is logged in - show logout button -->
                        <span class="text-gray-700 font-medium">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-red-700 transition-colors">
                                {{ __($pageName . '.logout') }}
                            </button>
                        </form>
                    @else
                        <!-- User is not logged in - show login and get started buttons -->
                        <a href="{{ route('auth.login') }}" class="bg-primary-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-primary-700 transition-colors">
                            {{ __($pageName . '.login') }}
                        </a>
                        <a href="#" class="border border-primary-600 text-primary-600 px-6 py-2 rounded-lg font-medium hover:bg-primary-50 transition-colors">
                            {{ __($pageName . '.get_started') }}
                        </a>
                    @endauth
                </div>
            @endif
            
            <!-- Language Dropdown -->
            <div class="relative language-dropdown" id="language-dropdown">
                <button 
                    type="button"
                    id="language-button"
                    class="flex items-center space-x-2 px-3 py-2 rounded-lg border border-gray-200 hover:border-primary-300 hover:bg-white transition-all duration-200 bg-white/80 backdrop-blur-sm"
                >
                    <i class="fas fa-globe text-gray-600"></i>
                    <span class="text-sm font-medium text-gray-700">
                        @if(app()->getLocale() === 'bn')
                            বাংলা
                        @else
                            English
                        @endif
                    </span>
                    <i class="fas fa-chevron-down text-gray-400 text-xs transition-transform duration-200" id="language-chevron"></i>
                </button>
                
                <!-- Dropdown Menu -->
                <div 
                    id="language-menu"
                    class="absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg border border-gray-200 z-[9999] transform origin-top opacity-0 invisible scale-95 transition-all duration-200"
                >
                    <a href="{{ route('language.switch', 'en') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-700 rounded-t-lg transition-colors {{ app()->getLocale() === 'en' ? 'bg-primary-50 text-primary-700' : '' }}">
                        <span class="flex items-center space-x-3">
                            <span class="w-4 h-4 bg-blue-500 rounded-sm"></span>
                            <span>English</span>
                            @if(app()->getLocale() === 'en')
                                <i class="fas fa-check text-primary-600 ml-auto"></i>
                            @endif
                        </span>
                    </a>
                    <a href="{{ route('language.switch', 'bn') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-700 rounded-b-lg transition-colors {{ app()->getLocale() === 'bn' ? 'bg-primary-50 text-primary-700' : '' }}">
                        <span class="flex items-center space-x-3">
                            <span class="w-4 h-4 bg-green-500 rounded-sm"></span>
                            <span>বাংলা</span>
                            @if(app()->getLocale() === 'bn')
                                <i class="fas fa-check text-primary-600 ml-auto"></i>
                            @endif
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
