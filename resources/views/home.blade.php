@extends('layouts.app')

@section('title', $settings->site_name)

@section('content')
<!-- Sections Renderer -->
@foreach($homeSections as $section)
    @switch($section['key'])
        @case('hero')
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
                    <div class="w-full h-full bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center" @if($slide->image_url) style="display: none;" @endif>
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
                            <a href="{{ $slide->button_url }}" class="btn-primary">
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
            @break
        @case('cta')

<!-- CTA Section -->
<section id="cta" class="relative py-12" style="background-color: #1cabe3 !important;">
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
            @break
        @case('products')

<!-- Products Section -->
<section id="products" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">منتجاتنا</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">{{ $settings->services_text ?? 'نقدم مجموعة شاملة من منتجات الغراء والمواد اللاصقة المتخصصة للاستخدامات المختلفة في البناء والتشييد.' }}</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($products->take(6) as $product)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="w-full h-48 flex items-center justify-center bg-white">
                    @if($product->cover_image_url)
                        <img src="{{ $product->cover_image_url }}" alt="{{ $product->name_ar }}" class="max-w-full max-h-full object-contain">
                    @elseif($product->image_url)
                        <img src="{{ $product->image_url }}" alt="{{ $product->name_ar }}" class="max-w-full max-h-full object-contain">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $product->name_ar }}</h3>
                    <p class="text-gray-600 mb-4 line-clamp-3">{{ $product->description_ar }}</p>
                    <div class="flex justify-center">
                        <a href="{{ route('products.show', $product) }}" class="btn-primary">تفاصيل أكثر</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500 text-lg">لا توجد منتجات متاحة حالياً</p>
            </div>
            @endforelse
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('products.index') }}" class="btn-primary">عرض جميع المنتجات</a>
        </div>
    </div>
        </section>
            @break
        @case('partners')

<!-- Partners Section -->
<section id="partners" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">شركاؤنا</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">الشركات والمقاولين الذين ساعدونا في تسويق منتجاتنا</p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @forelse($partners as $partner)
            <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 group">
                <div class="w-full h-20 flex items-center justify-center">
                    @if($partner->logo_url)
                        <img src="{{ $partner->logo_url }}" alt="{{ $partner->name_ar }}" class="max-w-full max-h-full object-contain">
                    @else
                        <div class="w-full h-20 bg-gray-100 rounded-lg flex items-center justify-center">
                            <span class="text-gray-400 text-sm">{{ $partner->name_ar }}</span>
                        </div>
                    @endif
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500 text-lg">لا توجد شراكات متاحة حالياً</p>
            </div>
            @endforelse
        </div>
    </div>
        </section>
            @break
        @case('projects')

<!-- Projects Section -->
<section id="projects" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">أعمالنا</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">نفتخر بمشاركتنا في العديد من المشاريع المتميزة في المملكة العربية السعودية</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($projects->take(3) as $project)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="w-full h-48 overflow-hidden">
                    @if($project->cover_image_url)
                        <img src="{{ $project->cover_image_url }}" alt="{{ $project->title_ar }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $project->title_ar }}</h3>
                    <p class="text-gray-600 mb-4 line-clamp-3">{{ $project->description_ar }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">{{ $project->location_ar }}</span>
                        <a href="{{ route('projects.show', $project) }}" class="btn-primary">تفاصيل أكثر</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500 text-lg">لا توجد مشاريع متاحة حالياً</p>
            </div>
            @endforelse
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('projects.index') }}" class="btn-primary">عرض جميع المشاريع</a>
        </div>
    </div>
        </section>
            @break
        @case('clients')

<!-- Clients Section -->
<section id="clients" class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">عملاؤنا</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">الشركات التي تثق في منتجاتنا</p>
        </div>
        
        <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @forelse($clients->take(6) as $client)
            <div class="bg-white rounded-lg p-3 hover:bg-gray-50 transition-all duration-300 group shadow-sm">
                <div class="w-full h-10 flex items-center justify-center mb-2">
                    @if($client->logo_url)
                        <img src="{{ $client->logo_url }}" alt="{{ $client->name_ar }}" class="w-full h-full object-contain">
                    @else
                        <div class="w-full h-10 bg-gray-100 rounded flex items-center justify-center">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="text-center">
                    <p class="text-xs text-gray-600 font-medium leading-tight">{{ $client->name_ar }}</p>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-8">
                <p class="text-gray-500 text-lg">لا توجد عملاء متاحين حالياً</p>
            </div>
            @endforelse
        </div>
    </div>
        </section>
            @break
        @case('contact')

<!-- Contact Section -->
<section id="contact" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Info -->
            <div>
                <h3 class="text-2xl font-bold text-gray-900 mb-6">معلومات الاتصال</h3>
                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center ml-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-1">الهاتف</h4>
                            <p class="text-gray-600">{{ $settings->contact_phone ?? '+966 50 123 4567' }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center ml-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-1">البريد الإلكتروني</h4>
                            <p class="text-gray-600">{{ $settings->contact_email ?? 'info@cerac.com' }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center ml-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-1">العنوان</h4>
                            <p class="text-gray-600">{{ $settings->contact_address ?? 'الخبر، المملكة العربية السعودية' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Map -->
            <div>
                <div class="rounded-lg overflow-hidden shadow-lg">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3579.215175115508!2d50.190236624045696!3d26.222197089423002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e49c3889f2ad1b7%3A0x79e8d551b56efcdc!2zQ0VSQUMgLyDYs9mK2LHYp9mD!5e0!3m2!1sar!2ssa!4v1757097039759!5m2!1sar!2ssa" 
                        width="100%" 
                        height="300" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        sandbox="allow-scripts allow-same-origin allow-popups">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
        </section>
            @break
    @endswitch
@endforeach
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Swiper
        const swiper = new Swiper('.hero-swiper', {
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
    });
</script>
@endpush