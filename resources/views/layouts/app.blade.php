<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', $settings->site_name ?? 'سيراك')</title>
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
            line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        /* Swiper Styles */
        .swiper {
            width: 100%;
            height: 100%;
        }
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .swiper-pagination-bullet {
            background: rgba(255, 255, 255, 0.5);
        }
        .swiper-pagination-bullet-active {
            background: white;
        }
        .swiper-button-next,
        .swiper-button-prev {
            color: white;
        }
        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 24px;
        }
        
        /* Section spacing */
        section {
            position: relative;
            z-index: 1;
        }
        
        /* Ensure proper spacing between sections */
        .py-16 {
            padding-top: 4rem;
            padding-bottom: 4rem;
        }
        
        .py-20 {
            padding-top: 5rem;
            padding-bottom: 5rem;
        }
        
        /* Fix for overlapping content */
        .relative {
            position: relative;
        }
        
        .z-10 {
            z-index: 10;
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    @include('layouts.partials.header')
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('layouts.partials.footer')
    
    @stack('scripts')
</body>
</html>
