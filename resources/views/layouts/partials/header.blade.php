<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between py-4">
            <div class="flex items-center">
                @if($settings->logo_url ?? false)
                    <img src="{{ $settings->logo_url }}" alt="Logo" class="h-20 w-auto">
                @endif
                <div class="mr-4">
                    <h1 class="text-2xl font-bold text-gray-900">{{ $settings->site_name ?? 'سيراك' }}</h1>
                    <p class="text-sm text-gray-600">مصنع مستقبل الغراء</p>
                </div>
            </div>
            <div class="flex items-center space-x-4 space-x-reverse">
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
        </div>
    </div>
</nav>
