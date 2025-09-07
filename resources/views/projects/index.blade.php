@extends('layouts.app')

@section('title', 'أعمالنا - ' . ($settings->site_name ?? 'سيراك'))

@section('content')
<!-- Hero Section -->
<section class="py-20" style="background-color: #1cabe3 !important;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6" style="color: #0e183c;">أعمالنا</h1>
        <p class="text-xl md:text-2xl mb-8" style="color: #0e183c;">نفتخر بمشاركتنا في العديد من المشاريع المتميزة في المملكة العربية السعودية</p>
    </div>
</section>

<!-- Projects Grid -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($allProjects->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($allProjects as $project)
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
                        
                        @if($project->client)
                        <div class="mb-4">
                            <span class="text-sm text-gray-500">العميل:</span>
                            <span class="text-sm font-medium text-gray-700">{{ $project->client->name_ar }}</span>
                        </div>
                        @endif
                        
                        <div class="flex justify-between items-center">
                            <div>
                                @if($project->location_ar)
                                    <span class="text-sm text-gray-500">{{ $project->location_ar }}</span>
                                @endif
                                @if($project->completion_date)
                                    <span class="text-sm text-gray-500 block">{{ $project->completion_date }}</span>
                                @endif
                            </div>
                            <a href="{{ route('projects.show', $project) }}" class="btn-primary">تفاصيل أكثر</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">لا توجد مشاريع متاحة حالياً</h3>
                <p class="text-gray-600">نعمل على إضافة مشاريع جديدة قريباً</p>
            </div>
        @endif
    </div>
</section>
@endsection