@extends('layouts.app')

@section('title', 'من نحن - ' . $settings->site_name)

@section('content')

<!-- Hero Section -->
<section class="py-20" style="background-color: #1cabe3 !important;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6" style="color: #0e183c;">من نحن</h1>
        <p class="text-xl md:text-2xl mb-8" style="color: #0e183c;">مصنع مستقبل الغراء - رواد في مجال إنتاج الغراء والمواد اللاصقة</p>
    </div>
</section>

<!-- About Content -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Text Content -->
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">مصنع مستقبل الغراء</h2>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    نحن في سيراك نقدم حلولاً متكاملة في مجال مواد البناء والغراء عالية الجودة، 
                    مع التزامنا بالابتكار والتميز في كل منتج نقدمه. تأسس مصنعنا على أسس قوية 
                    من الخبرة والجودة لنكون شريككم الموثوق في مشاريعكم الإنشائية.
                </p>
                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                    نسعى دائماً لتقديم أفضل المنتجات التي تلبي احتياجات السوق السعودي والعربي، 
                    مع الحفاظ على أعلى معايير الجودة والسلامة في جميع مراحل الإنتاج والتوزيع.
                </p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center ml-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">جودة مضمونة</h3>
                            <p class="text-sm text-gray-600">منتجاتنا تخضع لأعلى معايير الجودة</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center ml-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">سرعة في التوصيل</h3>
                            <p class="text-sm text-gray-600">نضمن وصول طلباتكم في الوقت المحدد</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center ml-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">خدمة عملاء متميزة</h3>
                            <p class="text-sm text-gray-600">فريق متخصص لخدمتكم على مدار الساعة</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center ml-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">ابتكار مستمر</h3>
                            <p class="text-sm text-gray-600">نطور منتجاتنا باستمرار لتلبية احتياجاتكم</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Image -->
            <div class="relative">
                <div class="w-full h-96 bg-gray-200 rounded-lg flex items-center justify-center">
                    <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Mission -->
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">رؤيتنا</h3>
                <p class="text-gray-600 leading-relaxed">
                    أن نكون الرائدين في مجال إنتاج الغراء والمواد اللاصقة في المملكة العربية السعودية 
                    والمنطقة، مع التزامنا بتقديم منتجات عالية الجودة تلبي احتياجات السوق المحلي والعربي.
                </p>
            </div>
            
            <!-- Vision -->
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">رسالتنا</h3>
                <p class="text-gray-600 leading-relaxed">
                    تقديم حلول متكاملة في مجال مواد البناء والغراء عالية الجودة، مع التركيز على 
                    الابتكار والتميز في الخدمة، لضمان رضا عملائنا ونجاح مشاريعهم الإنشائية.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Contact CTA -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">هل تريد معرفة المزيد عنا؟</h2>
        <p class="text-lg text-gray-600 mb-8 max-w-3xl mx-auto">
            تواصلوا معنا اليوم لمعرفة المزيد عن منتجاتنا وخدماتنا، ونحن سعداء لخدمتكم في جميع احتياجاتكم الإنشائية.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="btn-primary">تواصل معنا</a>
            <a href="{{ route('products.index') }}" class="btn-secondary">عرض منتجاتنا</a>
        </div>
    </div>
</section>

@endsection
