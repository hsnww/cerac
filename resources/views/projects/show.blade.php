@extends('layouts.app')

@section('title', $project->title_ar . ' - ' . $settings->site_name)

@section('content')

<!-- Hero Section -->
<section class="py-20" style="background-color: #1cabe3 !important;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6" style="color: #0e183c;">{{ $project->title_ar }}</h1>
        <p class="text-xl md:text-2xl mb-8" style="color: #0e183c;">{{ $project->location_ar ?? 'مشروع متميز من سيراك' }}</p>
    </div>
</section>

<!-- Project Details -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Project Image -->
            <div class="w-full h-96 overflow-hidden rounded-lg shadow-lg">
                @if($project->cover_image_url)
                    <img src="{{ $project->cover_image_url }}" alt="{{ $project->title_ar }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                        <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                @endif
            </div>
            
            <!-- Project Info -->
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $project->title_ar }}</h1>
                
                @if($project->description_ar)
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">وصف المشروع</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $project->description_ar }}</p>
                    </div>
                @endif
                
                <div class="space-y-4 mb-6">
                    @if($project->client)
                        <div class="flex items-center">
                            <span class="text-sm font-medium text-gray-700 w-24">العميل:</span>
                            <span class="text-gray-600">{{ $project->client->name_ar }}</span>
                        </div>
                    @endif
                    
                    @if($project->location_ar)
                        <div class="flex items-center">
                            <span class="text-sm font-medium text-gray-700 w-24">الموقع:</span>
                            <span class="text-gray-600">{{ $project->location_ar }}</span>
                        </div>
                    @endif
                    
                    @if($project->completion_date)
                        <div class="flex items-center">
                            <span class="text-sm font-medium text-gray-700 w-24">تاريخ الإنجاز:</span>
                            <span class="text-gray-600">{{ $project->completion_date }}</span>
                        </div>
                    @endif
                    
                    @if($project->budget)
                        <div class="flex items-center">
                            <span class="text-sm font-medium text-gray-700 w-24">الميزانية:</span>
                            <span class="text-gray-600">{{ $project->budget }} ريال</span>
                        </div>
                    @endif
                </div>
                
                @if($project->challenges_ar)
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">التحديات</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $project->challenges_ar }}</p>
                    </div>
                @endif
                
                @if($project->solutions_ar)
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">الحلول</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $project->solutions_ar }}</p>
                    </div>
                @endif
                
                @if($project->results_ar)
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">النتائج</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $project->results_ar }}</p>
                    </div>
                @endif
                
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('contact') }}" class="btn-primary">اطلب مشروع مماثل</a>
                    <a href="{{ route('projects.index') }}" class="btn-secondary">عرض جميع المشاريع</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Projects -->
@if($relatedProjects->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">مشاريع ذات صلة</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($relatedProjects as $relatedProject)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="w-full h-48 overflow-hidden">
                    @if($relatedProject->cover_image_url)
                        <img src="{{ $relatedProject->cover_image_url }}" alt="{{ $relatedProject->title_ar }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $relatedProject->title_ar }}</h3>
                    <p class="text-gray-600 mb-4 line-clamp-3">{{ $relatedProject->description_ar }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">{{ $relatedProject->location_ar }}</span>
                        <a href="{{ route('projects.show', $relatedProject) }}" class="btn-primary">تفاصيل أكثر</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection