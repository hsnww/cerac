<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>منتجاتنا - {{ $settings->site_name ?? 'سيراك' }}</title>
    <link rel="icon" type="image/x-icon" href="{{ $settings->favicon_url ?? '/favicon.ico' }}">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
        .hero-title {
            font-family: 'Almarai', sans-serif;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
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
                    <a href="/" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">الرئيسية</a>
                    <a href="/#about" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">من نحن</a>
                    <a href="/products" class="text-blue-600 px-3 py-2 rounded-md text-sm font-medium">المنتجات</a>
                    <a href="/projects" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">أعمالنا</a>
                    <a href="/contact" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">اتصل بنا</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-blue-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="hero-title text-4xl md:text-5xl font-bold text-white mb-4">منتجاتنا</h1>
            <p class="text-xl text-white opacity-90">مجموعة متنوعة من منتجات الغراء والمواد اللاصقة عالية الجودة</p>
        </div>
    </section>

    <!-- Products Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($products->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products as $product)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group">
                    <div class="relative bg-white h-64 overflow-hidden">
                        @if($product->image_url)
                            <img src="{{ $product->image_url }}" alt="{{ $product->title_ar }}" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        @endif
                        <div class="w-full h-full bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center" style="{{ $product->image_url ? 'display: none;' : '' }}">
                            <div class="text-center">
                                <svg class="w-16 h-16 text-blue-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-blue-600 text-sm font-medium">{{ $product->title_ar }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition">{{ $product->name_ar }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit($product->description_ar, 120) }}</p>
                        @if($product->price)
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-2xl font-bold text-blue-600">{{ number_format($product->price, 2) }} ريال</span>
                            </div>
                        @endif
                        <a href="{{ route('products.show', $product) }}" class="inline-flex items-center justify-center w-full bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
                            عرض التفاصيل
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-20">
                <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">لا توجد منتجات متاحة حالياً</h3>
                <p class="text-gray-600">سنقوم بإضافة منتجاتنا قريباً</p>
            </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="text-center">
                <p class="text-gray-300 text-sm">
                    &copy; {{ date('Y') }} {{ $settings->site_name ?? 'سيراك' }}. جميع الحقوق محفوظة.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
