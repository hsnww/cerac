<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $product->name_ar }} - {{ $settings->site_name ?? 'سيراك' }}</title>
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

    <!-- Product Details -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Product Image -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="relative bg-white h-96 overflow-hidden">
                        @if($product->image_url)
                            <img src="{{ $product->image_url }}" alt="{{ $product->name_ar }}" class="w-full h-full object-contain" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        @endif
                        <div class="w-full h-full bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center" style="{{ $product->image_url ? 'display: none;' : '' }}">
                            <div class="text-center">
                                <svg class="w-24 h-24 text-blue-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-blue-600 text-lg font-medium">{{ $product->name_ar }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="space-y-6">
                    <div>
                        <h1 class="hero-title text-4xl font-bold text-gray-900 mb-4">{{ $product->name_ar }}</h1>
                        @if($product->title_ar)
                            <h2 class="text-2xl text-gray-600 mb-4">{{ $product->title_ar }}</h2>
                        @endif
                    </div>

                    @if($product->description_ar)
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">وصف المنتج</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $product->description_ar }}</p>
                    </div>
                    @endif

                    @if($product->price)
                    <div class="bg-blue-50 rounded-lg p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">السعر</h3>
                        <p class="text-3xl font-bold text-blue-600">{{ number_format($product->price, 2) }} ريال</p>
                    </div>
                    @endif

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/contact" class="inline-flex items-center justify-center bg-blue-600 text-white px-8 py-4 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            اطلب الآن
                        </a>
                        <a href="/products" class="inline-flex items-center justify-center border-2 border-blue-600 text-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-blue-50 transition duration-300">
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            العودة للمنتجات
                        </a>
                    </div>
                </div>
            </div>
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
