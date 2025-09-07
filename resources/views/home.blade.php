<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $settings->site_name }}</title>
    <link rel="icon" type="image/x-icon" href="{{ $settings->favicon_url }}">
    
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
        .aspect-w-16 {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 */
        }
        .aspect-h-9 {
            position: absolute;
            height: 100%;
            width: 100%;
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
                    @if($settings->logo_url)
                        <img src="{{ $settings->logo_url }}" alt="Logo" class="h-20 w-auto">
                    @endif
                    <div class="mr-4">
                        <h1 class="text-2xl font-bold text-gray-900">{{ $settings->site_name }}</h1>
                        <p class="text-sm text-gray-600">مصنع مستقبل الغراء</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4 space-x-reverse">
                    <a href="#home" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">الرئيسية</a>
                    <a href="#about" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">من نحن</a>
                    <a href="#products" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">المنتجات</a>
                    <a href="{{ route('projects.index') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">أعمالنا</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">اتصل بنا</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    @if($heroSlides->count() > 0)
    <section id="home" class="relative">
        <div class="swiper hero-swiper">
            <div class="swiper-wrapper">
                @foreach($heroSlides as $slide)
                @php
                    $gradients = [
                        'bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900',
                        'bg-gradient-to-br from-green-600 via-green-700 to-green-900',
                        'bg-gradient-to-br from-purple-600 via-purple-700 to-purple-900',
                        'bg-gradient-to-br from-red-600 via-red-700 to-red-900',
                        'bg-gradient-to-br from-yellow-600 via-yellow-700 to-yellow-900'
                    ];
                    $gradient = $gradients[($loop->iteration - 1) % count($gradients)];
                @endphp
                <div class="swiper-slide relative h-[500px] {{ $gradient }}">
                    <div class="absolute inset-0">
                        @if($slide->image_url)
                            <img src="{{ $slide->image_url }}" alt="{{ $slide->title_ar }}" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        @endif
                        <div class="w-full h-full bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center" style="{{ $slide->image_url ? 'display: none;' : '' }}">
                            <div class="text-center">
                                <div class="w-32 h-32 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-white text-2xl font-bold mb-2">{{ $slide->title_ar }}</h3>
                                <p class="text-white text-lg opacity-75">صورة {{ $slide->title_ar }}</p>
                            </div>
                        </div>
                        <!-- Light overlay for text readability -->
                        <div class="absolute inset-0" style="background-color: rgba(0, 0, 0, 0.35);"></div>
                    </div>
                    <div class="relative z-10 flex items-center justify-center h-full">
                        <div class="text-center text-white px-4 max-w-4xl mx-auto">
                            <h1 class="hero-title text-4xl md:text-6xl font-bold mb-6 text-white" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">{{ $slide->title_ar }}</h1>
                            @if($slide->subtitle_ar)
                                <h2 class="text-xl md:text-2xl mb-4 text-white" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">{{ $slide->subtitle_ar }}</h2>
                            @endif
                            @if($slide->description_ar)
                                <p class="text-lg md:text-xl mb-8 text-white" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">{{ $slide->description_ar }}</p>
                            @endif
                            @if($slide->button_text_ar && $slide->button_url)
                                <a href="{{ $slide->button_url }}" class="inline-block bg-yellow-500 text-black px-8 py-4 rounded-lg text-lg font-semibold hover:bg-yellow-400 transition duration-300">
                                    {{ $slide->button_text_ar }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>
    @else
    <!-- Fallback Hero Section -->
    <section id="home" class="relative h-[500px] bg-gradient-to-r from-blue-900 to-blue-700 flex items-center justify-center">
        <div class="text-center text-white px-4 max-w-4xl mx-auto">
            <h1 class="hero-title text-4xl md:text-6xl font-bold mb-6">مرحباً بكم في سيراك</h1>
            <h2 class="text-xl md:text-2xl mb-4">مصنع مستقبل الغراء</h2>
            <p class="text-lg md:text-xl mb-8">نحن نقدم أفضل منتجات الغراء ومواد البناء عالية الجودة لجميع احتياجاتكم الإنشائية</p>
            <a href="#products" class="inline-block bg-yellow-500 text-black px-8 py-4 rounded-lg text-lg font-semibold hover:bg-yellow-400 transition duration-300">
                اكتشف منتجاتنا
            </a>
        </div>
    </section>
    @endif

    <!-- CTA Section -->
    <section class="relative py-12" style="background-color: #1cabe3 !important;">
        <div class="absolute inset-0" style="background: rgba(255, 255, 255, 0.05);"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-white">
                <h2 class="text-3xl md:text-4xl font-bold mb-4" style="color: #0e183c;">
                    مصنع مستقبل الغراء
                </h2>
                <p class="text-lg md:text-xl mb-8 leading-relaxed" style="color: #0e183c; font-weight: 300;">
                    نحن في سيراك نقدم حلولاً متكاملة في مجال مواد البناء والغراء عالية الجودة، 
                    مع التزامنا بالابتكار والتميز في كل منتج نقدمه
                </p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="flex items-center text-right">
                        <div class="w-12 h-12 ml-4 rounded-full flex items-center justify-center flex-shrink-0" style="background-color: rgba(255, 255, 255, 0.2);">
                            <svg class="w-6 h-6" style="color: #0e183c;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-1" style="color: #0e183c;">جودة مضمونة</h3>
                            <p class="text-sm" style="color: #0e183c; font-weight: 300;">منتجاتنا تخضع لأعلى معايير الجودة</p>
                        </div>
                    </div>
                    <div class="flex items-center text-right">
                        <div class="w-12 h-12 ml-4 rounded-full flex items-center justify-center flex-shrink-0" style="background-color: rgba(255, 255, 255, 0.2);">
                            <svg class="w-6 h-6" style="color: #0e183c;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-1" style="color: #0e183c;">سرعة في التوصيل</h3>
                            <p class="text-sm" style="color: #0e183c; font-weight: 300;">نضمن وصول طلباتكم في الوقت المحدد</p>
                        </div>
                    </div>
                    <div class="flex items-center text-right">
                        <div class="w-12 h-12 ml-4 rounded-full flex items-center justify-center flex-shrink-0" style="background-color: rgba(255, 255, 255, 0.2);">
                            <svg class="w-6 h-6" style="color: #0e183c;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-1" style="color: #0e183c;">خدمة عملاء متميزة</h3>
                            <p class="text-sm" style="color: #0e183c; font-weight: 300;">فريق متخصص لخدمتكم على مدار الساعة</p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#products" class="inline-flex items-center justify-center px-6 py-3 rounded-xl text-base font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl" style="background-color: #0e183c; color: white;">
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        اكتشف منتجاتنا
                    </a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-6 py-3 rounded-xl text-base font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl border-2" style="border-color: #0e183c; color: #0e183c; background-color: rgba(255, 255, 255, 0.2);">
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        تواصل معنا
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    @if($products->count() > 0)
    <section id="products" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">منتجاتنا</h2>
                <p class="text-xl text-gray-600">مجموعة متنوعة من منتجات الغراء والمواد اللاصقة عالية الجودة</p>
            </div>
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
                        <div class="flex flex-col gap-2">
                            <a href="{{ route('products.show', $product) }}" class="inline-flex items-center justify-center bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition font-semibold">
                                عرض التفاصيل
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center border border-blue-600 text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-50 transition font-semibold">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                اطلب الآن
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-12">
                <a href="{{ route('products.index') }}" class="inline-flex items-center bg-blue-600 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:bg-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    عرض جميع المنتجات
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Partners Section -->
    @if($partners->count() > 0)
    <section id="partners" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">شركاؤنا</h2>
                <p class="text-xl text-gray-600">الشركات والمقاولين الذين ساعدونا في تسويق منتجاتنا</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach($partners as $partner)
                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 group">
                    @if($partner->logo_url)
                        <img src="{{ $partner->logo_url }}" alt="{{ $partner->name_ar }}" class="w-full h-20 object-contain group-hover:scale-110 transition-transform duration-300">
                    @else
                        <div class="w-full h-20 bg-gradient-to-br from-blue-100 to-blue-200 rounded-lg flex items-center justify-center">
                            <span class="text-blue-600 text-sm font-medium">{{ $partner->name_ar }}</span>
                        </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Projects Section -->
    @if($featuredProjects->count() > 0)
    <section id="projects" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">أعمالنا</h2>
                <p class="text-xl text-gray-600">استكشف مجموعة من مشاريعنا الناجحة التي تم تنفيذها باستخدام منتجات سيراك</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredProjects as $project)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group">
                    <div class="relative bg-gray-200 h-64 overflow-hidden">
                        @if($project->cover_image_url)
                            <img src="{{ $project->cover_image_url }}" alt="{{ $project->title_ar }}" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        @endif
                        <div class="w-full h-full bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center" style="{{ $project->cover_image_url ? 'display: none;' : '' }}">
                            <div class="text-center">
                                <svg class="w-16 h-16 text-blue-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                                <p class="text-blue-600 text-sm font-medium">{{ $project->title_ar }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-yellow-100 text-yellow-800 text-sm font-medium px-3 py-1 rounded-full">مميز</span>
                            @if($project->client)
                                <span class="text-sm text-gray-500">{{ $project->client->name_ar }}</span>
                            @endif
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition">{{ $project->title_ar }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit($project->description_ar, 120) }}</p>
                        <a href="{{ route('projects.show', $project) }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
                            عرض التفاصيل
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-12">
                <a href="{{ route('projects.index') }}" class="inline-flex items-center bg-blue-600 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:bg-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    عرض جميع المشاريع
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Clients Section -->
    @if($clients->count() > 0)
    <section id="clients" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">عملاؤنا</h2>
                <p class="text-xl text-gray-600">الشركات التي تثق في منتجاتنا</p>
            </div>
            <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-4">
                @foreach($clients as $client)
                <div class="bg-gray-50 rounded-lg p-3 hover:bg-gray-100 transition-all duration-300 group">
                    @if($client->logo_url)
                        <img src="{{ $client->logo_url }}" alt="{{ $client->name_ar }}" class="w-full h-12 object-contain group-hover:scale-110 transition-transform duration-300">
                    @else
                        <div class="w-full h-12 bg-gradient-to-br from-blue-100 to-blue-200 rounded-lg flex items-center justify-center">
                            <span class="text-blue-600 text-xs font-medium">{{ $client->name_ar }}</span>
                        </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div>
                    <h3 class="text-2xl font-bold mb-6 text-gray-800">معلومات التواصل</h3>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-600 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span class="text-gray-700">{{ $settings->phone }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-600 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-gray-700">{{ $settings->email }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-600 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-gray-700">{{ $settings->address }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-600 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-700">{{ $settings->working_hours }}</span>
                        </div>
                    </div>
                    <div class="mt-8">
                        <a href="{{ route('contact') }}" class="inline-flex items-center bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            صفحة اتصل بنا الكاملة
                        </a>
                    </div>
                </div>
                <div>
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3579.215175115508!2d50.190236624045696!3d26.222197089423002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e49c3889f2ad1b7%3A0x79e8d551b56efcdc!2zQ0VSQUMgLyDYs9mK2LHYp9mD!5e0!3m2!1sar!2ssa!4v1757097039759!5m2!1sar!2ssa"
                            width="100%" 
                            height="300" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="lg:col-span-1">
                    <div class="mb-4">
                        @if($settings->logo_light_url)
                            <img src="{{ $settings->logo_light_url }}" alt="{{ $settings->site_name }}" class="h-16 w-auto" style="filter: brightness(0) invert(1);">
                        @elseif($settings->logo_url)
                            <img src="{{ $settings->logo_url }}" alt="{{ $settings->site_name }}" class="h-16 w-auto" style="filter: brightness(0) invert(1);">
                        @else
                            <h3 class="text-2xl font-bold text-white">{{ $settings->site_name }}</h3>
                        @endif
                    </div>
                    <p class="text-gray-300 text-sm leading-relaxed mb-4">
                        {{ $settings->site_description }}
                    </p>
                    <div class="space-y-2">
                        <div class="flex items-center text-sm text-gray-300">
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            {{ $settings->phone }}
                        </div>
                        <div class="flex items-center text-sm text-gray-300">
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            {{ $settings->email }}
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">الصفحات الرسمية</h4>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-gray-300 hover:text-white transition-colors text-sm">الرئيسية</a></li>
                        <li><a href="/about" class="text-gray-300 hover:text-white transition-colors text-sm">من نحن</a></li>
                        <li><a href="/products" class="text-gray-300 hover:text-white transition-colors text-sm">منتجاتنا</a></li>
                        <li><a href="/projects" class="text-gray-300 hover:text-white transition-colors text-sm">أعمالنا</a></li>
                        <li><a href="/contact" class="text-gray-300 hover:text-white transition-colors text-sm">تواصل معنا</a></li>
                    </ul>
                </div>

                <!-- Legal Pages -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">السياسات</h4>
                    <ul class="space-y-2">
                        <li><a href="/privacy-policy" class="text-gray-300 hover:text-white transition-colors text-sm">سياسة الخصوصية</a></li>
                        <li><a href="/terms-of-use" class="text-gray-300 hover:text-white transition-colors text-sm">شروط الاستخدام</a></li>
                    </ul>
                </div>

                <!-- Social Media -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">تابعنا</h4>
                    <div class="flex flex-wrap gap-4">
                        @if($settings->facebook_url)
                        <a href="{{ $settings->facebook_url }}" target="_blank" class="text-gray-300 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        @endif
                        @if($settings->twitter_url)
                        <a href="{{ $settings->twitter_url }}" target="_blank" class="text-gray-300 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        @endif
                        @if($settings->linkedin_url)
                        <a href="{{ $settings->linkedin_url }}" target="_blank" class="text-gray-300 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                        @endif
                        @if($settings->instagram_url)
                        <a href="{{ $settings->instagram_url }}" target="_blank" class="text-gray-300 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        @endif
                        @if($settings->youtube_url)
                        <a href="{{ $settings->youtube_url }}" target="_blank" class="text-gray-300 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p class="text-gray-300 text-sm">
                    &copy; {{ date('Y') }} {{ $settings->site_name }}. جميع الحقوق محفوظة.
                </p>
            </div>
        </div>
    </footer>

    <!-- Popup Component -->
    @include('components.popup')

    <!-- Additional JavaScript for Hero Slider -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Wait for Swiper to load
            function initSwiper() {
                if (typeof Swiper !== 'undefined') {
                    try {
                        const heroSwiper = new Swiper('.hero-swiper', {
                            loop: true,
                            autoplay: {
                                delay: 5000,
                                disableOnInteraction: false,
                            },
                            pagination: {
                                el: '.swiper-pagination',
                                clickable: true,
                            },
                            navigation: {
                                nextEl: '.swiper-button-next',
                                prevEl: '.swiper-button-prev',
                            },
                        });
                        console.log('Hero Swiper initialized successfully');
                    } catch (error) {
                        console.error('Error initializing Swiper:', error);
                    }
                } else {
                    console.log('Swiper not loaded, retrying...');
                    setTimeout(initSwiper, 100);
                }
            }
            
            // Start initialization
            initSwiper();
        });
    </script>
</body>
</html>

