<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', $settings->site_name ?? 'سيراك')</title>
    <link rel="icon" type="image/x-icon" href="{{ $settings->favicon_url ?? '/favicon.ico' }}">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            overflow-x: hidden; /* Prevent horizontal scroll */
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
        
        /* Mobile Responsive Fixes */
        @media (max-width: 768px) {
            .py-16 {
                padding-top: 2rem;
                padding-bottom: 2rem;
            }
            
            .py-20 {
                padding-top: 2.5rem;
                padding-bottom: 2.5rem;
            }
            
            /* Ensure proper mobile spacing */
            .px-4 {
                padding-left: 1rem;
                padding-right: 1rem;
            }
            
            /* Fix hero section height on mobile */
            .h-\[500px\] {
                height: 300px;
            }
            
            /* Mobile text sizes */
            .text-4xl {
                font-size: 2rem;
            }
            
            .text-6xl {
                font-size: 2.5rem;
            }
            
            .text-3xl {
                font-size: 1.875rem;
            }
            
            /* Mobile grid adjustments */
            .grid-cols-1 {
                grid-template-columns: repeat(1, minmax(0, 1fr));
            }
            
            /* Mobile button adjustments */
            .btn-primary {
                padding: 0.75rem 1.5rem;
                font-size: 0.875rem;
            }
        }
        
        /* Extra small screens */
        @media (max-width: 480px) {
            .px-4 {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }
            
            .h-\[500px\] {
                height: 250px;
            }
            
            .text-4xl {
                font-size: 1.75rem;
            }
            
            .text-6xl {
                font-size: 2rem;
            }
        }
        
        /* Prevent horizontal overflow */
        * {
            box-sizing: border-box;
        }
        
        /* Fix for RTL layout issues */
        [dir="rtl"] {
            text-align: right;
        }
        
        /* Desktop Menu Fixes - Using Tailwind classes only */
        
        /* Ensure proper container width */
        .max-w-7xl {
            max-width: 80rem;
        }
        
        @media (max-width: 1280px) {
            .max-w-7xl {
                max-width: 100%;
            }
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
