<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <!-- Logo and Brand -->
            <div class="flex items-center">
                @if($settings->logo_url ?? false)
                    <img src="{{ $settings->logo_url }}" alt="Logo" class="h-8 sm:h-10 md:h-12 lg:h-16 w-auto">
                @endif
                <div class="mr-2 md:mr-4">
                    <h1 class="text-sm sm:text-base md:text-lg lg:text-xl font-bold text-gray-900">{{ $settings->site_name ?? 'سيراك' }}</h1>
                    <p class="text-xs md:text-sm text-gray-600 hidden sm:block">مصنع مستقبل الغراء</p>
                </div>
            </div>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-4 space-x-reverse">
                <a href="{{ route('home') }}" 
                   class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('home') ? 'text-blue-600' : '' }}">
                   الرئيسية
                </a>
                <a href="{{ route('about') }}" 
                   class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('about') ? 'text-blue-600' : '' }}">
                   من نحن
                </a>
                <a href="{{ route('products.index') }}" 
                   class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('products.*') ? 'text-blue-600' : '' }}">
                   المنتجات
                </a>
                <a href="{{ route('projects.index') }}" 
                   class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('projects.*') ? 'text-blue-600' : '' }}">
                   أعمالنا
                </a>
                <a href="{{ route('contact') }}" 
                   class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('contact') ? 'text-blue-600' : '' }}">
                   اتصل بنا
                </a>
            </div>
            
            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-700 hover:text-blue-600 focus:outline-none focus:text-blue-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 bg-white border-t">
                <a href="{{ route('home') }}" 
                   class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('home') ? 'text-blue-600 bg-blue-50' : '' }}">
                   الرئيسية
                </a>
                <a href="{{ route('about') }}" 
                   class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('about') ? 'text-blue-600 bg-blue-50' : '' }}">
                   من نحن
                </a>
                <a href="{{ route('products.index') }}" 
                   class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('products.*') ? 'text-blue-600 bg-blue-50' : '' }}">
                   المنتجات
                </a>
                <a href="{{ route('projects.index') }}" 
                   class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('projects.*') ? 'text-blue-600 bg-blue-50' : '' }}">
                   أعمالنا
                </a>
                <a href="{{ route('contact') }}" 
                   class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('contact') ? 'text-blue-600 bg-blue-50' : '' }}">
                   اتصل بنا
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                mobileMenu.classList.add('hidden');
            }
        });
    }
});
</script>
