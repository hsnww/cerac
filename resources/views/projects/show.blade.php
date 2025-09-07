<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $project->title_ar }} - {{ \App\Models\SiteSetting::getSettings()->site_name }}</title>
    <link rel="icon" type="image/x-icon" href="{{ \App\Models\SiteSetting::getSettings()->favicon_url }}">
    
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
                    @if(\App\Models\SiteSetting::getSettings()->logo_url)
                        <img src="{{ \App\Models\SiteSetting::getSettings()->logo_url }}" alt="Logo" class="h-16 w-auto">
                    @endif
                    <div class="mr-4">
                        <h1 class="text-2xl font-bold text-gray-900">{{ \App\Models\SiteSetting::getSettings()->site_name }}</h1>
                        <p class="text-sm text-gray-600">مصنع مستقبل الغراء</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4 space-x-reverse">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">الرئيسية</a>
                    <a href="{{ route('home') }}#about" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">من نحن</a>
                    <a href="{{ route('home') }}#products" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">المنتجات</a>
                    <a href="{{ route('projects.index') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">أعمالنا</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">اتصل بنا</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Project Hero -->
    <section class="bg-gradient-to-r from-blue-900 to-blue-700 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center mb-4">
                <a href="{{ route('projects.index') }}" class="text-blue-200 hover:text-white transition">
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    العودة للمشاريع
                </a>
            </div>
            <h1 class="hero-title text-4xl md:text-6xl font-bold mb-6">{{ $project->title_ar }}</h1>
            @if($project->client)
                <p class="text-xl md:text-2xl text-blue-200">عميل: {{ $project->client->name_ar }}</p>
            @endif
        </div>
    </section>

    <!-- Project Details -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Project Image -->
                    @if($project->cover_image_url)
                    <div class="mb-8">
                        <img src="{{ $project->cover_image_url }}" alt="{{ $project->title_ar }}" class="w-full h-96 object-cover rounded-2xl shadow-lg">
                    </div>
                    @endif

                    <!-- Project Description -->
                    @if($project->description_ar)
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">وصف المشروع</h2>
                        <div class="prose max-w-none text-gray-600 leading-relaxed">
                            {!! nl2br(e($project->description_ar)) !!}
                        </div>
                    </div>
                    @endif

                    <!-- Project Gallery -->
                    @if($project->gallery_images->count() > 0)
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">معرض الصور</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($project->gallery_images as $image)
                            <div class="relative bg-gray-200 rounded-lg overflow-hidden h-48">
                                <img src="{{ $image->getUrl() }}" alt="{{ $image->name }}" class="w-full h-full object-contain hover:scale-105 transition-transform duration-300">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="bg-gray-50 rounded-2xl p-6 sticky top-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-6">تفاصيل المشروع</h3>
                        
                        <div class="space-y-4">
                            @if($project->location_text)
                            <div>
                                <span class="text-sm font-medium text-gray-500">الموقع:</span>
                                <p class="text-gray-900">{{ $project->location_text }}</p>
                            </div>
                            @endif

                            @if($project->client)
                            <div>
                                <span class="text-sm font-medium text-gray-500">العميل:</span>
                                <p class="text-gray-900">{{ $project->client->name_ar }}</p>
                            </div>
                            @endif

                            @if($project->video_url)
                            <div>
                                <span class="text-sm font-medium text-gray-500">فيديو المشروع:</span>
                                <a href="{{ $project->video_url }}" target="_blank" class="text-blue-600 hover:text-blue-700">مشاهدة الفيديو</a>
                            </div>
                            @endif

                            <div>
                                <span class="text-sm font-medium text-gray-500">تاريخ الإنشاء:</span>
                                <p class="text-gray-900">{{ $project->created_at->format('Y/m/d') }}</p>
                            </div>

                            @if($project->is_featured)
                            <div>
                                <span class="bg-yellow-100 text-yellow-800 text-sm font-medium px-3 py-1 rounded-full">مشروع مميز</span>
                            </div>
                            @endif
                        </div>

                        <!-- CTA -->
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <a href="{{ route('contact') }}" class="w-full bg-blue-600 text-white text-center py-3 px-4 rounded-lg font-semibold hover:bg-blue-700 transition block">
                                اطلب مشروع مشابه
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Projects -->
    @if($relatedProjects->count() > 0)
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">مشاريع ذات صلة</h2>
                <p class="text-xl text-gray-600">استكشف مشاريع أخرى قد تهمك</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($relatedProjects as $relatedProject)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group">
                    <div class="relative bg-gray-200 h-64 overflow-hidden">
                        @if($relatedProject->cover_image_url)
                            <img src="{{ $relatedProject->cover_image_url }}" alt="{{ $relatedProject->title_ar }}" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                                <svg class="w-16 h-16 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            @if($relatedProject->is_featured)
                                <span class="bg-yellow-100 text-yellow-800 text-sm font-medium px-3 py-1 rounded-full">مميز</span>
                            @endif
                            @if($relatedProject->client)
                                <span class="text-sm text-gray-500">{{ $relatedProject->client->name_ar }}</span>
                            @endif
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition">{{ $relatedProject->title_ar }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit($relatedProject->description_ar, 120) }}</p>
                        <a href="{{ route('projects.show', $relatedProject) }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
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
    @endif

    <!-- CTA Section -->
    <section class="py-20 bg-blue-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">هل أعجبك هذا المشروع؟</h2>
            <p class="text-xl mb-8">تواصل معنا لتنفيذ مشروع مشابه</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center bg-white text-blue-600 px-8 py-4 rounded-xl font-semibold text-lg hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                تواصل معنا الآن
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p>&copy; {{ date('Y') }} {{ \App\Models\SiteSetting::getSettings()->site_name }}. جميع الحقوق محفوظة.</p>
            </div>
        </div>
    </footer>
</body>
</html>

