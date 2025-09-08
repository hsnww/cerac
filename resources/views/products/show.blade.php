@extends('layouts.app')

@section('title', $product->name_ar . ' - ' . ($settings->site_name ?? 'سيراك'))

@section('content')

<!-- Hero Section -->
<section class="py-20" style="background-color: #1cabe3 !important;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6" style="color: #0e183c;">{{ $product->name_ar }}</h1>
        <p class="text-xl md:text-2xl mb-8" style="color: #0e183c;">{{ $product->title_ar ?? 'منتج عالي الجودة من سيراك' }}</p>
    </div>
</section>

<!-- Product Details -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Product Images -->
            <div>
                <!-- Cover Image -->
                <div class="w-full h-96 flex items-center justify-center bg-white rounded-lg shadow-lg mb-6">
                    @if($product->cover_image_url)
                        <img src="{{ $product->cover_image_url }}" alt="{{ $product->name_ar }}" class="max-w-full max-h-full object-contain">
                    @elseif($product->image_url)
                        <img src="{{ $product->image_url }}" alt="{{ $product->name_ar }}" class="max-w-full max-h-full object-contain">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                            <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>

                <!-- Gallery Images -->
                @if($product->getMedia('product_gallery')->count() > 0)
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">معرض الصور</h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($product->getMedia('product_gallery') as $galleryImage)
                        <div class="aspect-square bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="{{ $galleryImage->getUrl() }}" alt="{{ $product->name_ar }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300 cursor-pointer" onclick="openImageModal('{{ $galleryImage->getUrl() }}', '{{ $product->name_ar }}')">
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Specification Document -->
                @if($product->spec_document_url)
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">ملف المواصفات</h3>
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <div class="flex items-center">
                            <svg class="w-8 h-8 text-blue-600 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">ملف المواصفات التفصيلية</p>
                                <p class="text-xs text-gray-500">PDF / Word Document</p>
                            </div>
                            <a href="{{ $product->spec_document_url }}" target="_blank" class="btn-primary text-sm px-4 py-2">
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                تحميل
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            
            <!-- Product Info -->
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $product->name_ar }}</h1>
                
                @if($product->title_ar)
                    <h2 class="text-xl text-gray-700 mb-6">{{ $product->title_ar }}</h2>
                @endif
                
                
                @if($product->description_ar)
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">الوصف</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $product->description_ar }}</p>
                    </div>
                @endif
                
                @if($product->features_ar)
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">المميزات</h3>
                        <p class="text-gray-600 leading-relaxed">{{ is_array($product->features_ar) ? implode(', ', $product->features_ar) : $product->features_ar }}</p>
                    </div>
                @endif
                
                @if($product->specifications_ar)
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">المواصفات</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $product->specifications_ar }}</p>
                    </div>
                @endif
                
                @if($product->usage_instructions_ar)
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">تعليمات الاستخدام</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $product->usage_instructions_ar }}</p>
                    </div>
                @endif
                
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('contact') }}" class="btn-primary">اطلب الآن</a>
                    <a href="{{ route('products.index') }}" class="btn-secondary">عرض جميع المنتجات</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
@if($relatedProducts->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">منتجات ذات صلة</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($relatedProducts as $relatedProduct)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="w-full h-48 flex items-center justify-center bg-white">
                    @if($relatedProduct->cover_image_url)
                        <img src="{{ $relatedProduct->cover_image_url }}" alt="{{ $relatedProduct->name_ar }}" class="max-w-full max-h-full object-contain">
                    @elseif($relatedProduct->image_url)
                        <img src="{{ $relatedProduct->image_url }}" alt="{{ $relatedProduct->name_ar }}" class="max-w-full max-h-full object-contain">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $relatedProduct->name_ar }}</h3>
                    <p class="text-gray-600 mb-4 line-clamp-3">{{ $relatedProduct->description_ar }}</p>
                    <div class="flex justify-center">
                        <a href="{{ route('products.show', $relatedProduct) }}" class="btn-primary">تفاصيل أكثر</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Image Modal -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 z-50 hidden flex items-center justify-center p-4">
    <div class="relative max-w-4xl max-h-full">
        <button onclick="closeImageModal()" class="absolute top-4 right-4 text-white bg-black bg-opacity-50 rounded-full p-2 hover:bg-opacity-75 transition-all">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <img id="modalImage" src="" alt="" class="max-w-full max-h-full object-contain rounded-lg">
        <p id="modalCaption" class="text-white text-center mt-4 text-lg"></p>
    </div>
</div>
@endsection

@push('scripts')
<script>
function openImageModal(imageUrl, caption) {
    document.getElementById('modalImage').src = imageUrl;
    document.getElementById('modalCaption').textContent = caption;
    document.getElementById('imageModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeImageModal() {
    document.getElementById('imageModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside the image
document.getElementById('imageModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeImageModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeImageModal();
    }
});
</script>
@endpush