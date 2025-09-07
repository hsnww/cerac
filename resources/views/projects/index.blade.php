<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>أعمالنا - {{ $settings->site_name ?? 'سيراك' }}</title>
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
                    <a href="/products" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">المنتجات</a>
                    <a href="/projects" class="text-blue-600 px-3 py-2 rounded-md text-sm font-medium">أعمالنا</a>
                    <a href="/contact" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">اتصل بنا</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-blue-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="hero-title text-4xl md:text-5xl font-bold text-white mb-4">أعمالنا</h1>
            <p class="text-xl text-white opacity-90">استكشف مجموعة من مشاريعنا الناجحة التي تم تنفيذها باستخدام منتجات سيراك</p>
        </div>
    </section>

    <!-- Projects Section -->
    @if($featuredProjects->count() > 0)
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">أعمالنا</h2>
                <p class="text-xl text-gray-600">استكشف مجموعة من مشاريعنا الناجحة التي تم تنفيذها باستخدام منتجات سيراك</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredProjects as $project)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group">
                    <div class="relative bg-white h-64 overflow-hidden">
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
        </div>
    </section>
    @else
    <!-- No Projects -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center py-20">
                <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">لا توجد مشاريع متاحة حالياً</h3>
                <p class="text-gray-600">سنقوم بإضافة مشاريعنا قريباً</p>
            </div>
        </div>
    </section>
    @endif

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


