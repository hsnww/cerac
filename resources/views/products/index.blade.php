@extends('layouts.app')

@section('title', 'منتجاتنا - ' . ($settings->site_name ?? 'سيراك'))

@section('content')
<!-- Hero Section -->
<section class="py-20" style="background-color: #1cabe3 !important;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6" style="color: #0e183c;">منتجاتنا</h1>
        <p class="text-xl md:text-2xl mb-8" style="color: #0e183c;">نقدم مجموعة شاملة من منتجات الغراء والمواد اللاصقة عالية الجودة</p>
    </div>
</section>

<!-- Products Grid -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($products->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products as $product)
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
                        
                        @if($product->features_ar)
                        <div class="mb-4">
                            <h4 class="text-sm font-semibold text-gray-700 mb-2">المميزات:</h4>
                            <p class="text-sm text-gray-600">{{ is_array($product->features_ar) ? implode(', ', $product->features_ar) : $product->features_ar }}</p>
                        </div>
                        @endif
                        
                        <div class="flex justify-center">
                            <a href="{{ route('products.show', $product) }}" class="btn-primary">تفاصيل أكثر</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">لا توجد منتجات متاحة حالياً</h3>
                <p class="text-gray-600">نعمل على إضافة منتجات جديدة قريباً</p>
            </div>
        @endif
    </div>
</section>
@endsection