<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // حذف البيانات الموجودة مسبقاً
        Project::query()->delete();
        
        $projects = [
            [
                'title_ar' => 'مشروع المجمع السكني الحديث',
                'title_en' => 'Modern Residential Complex Project',
                'description_ar' => 'مشروع سكني متكامل يضم 500 وحدة سكنية مع مرافق حديثة وخدمات متطورة، تم تنفيذه باستخدام أحدث تقنيات البناء ومواد سيراك عالية الجودة.',
                'description_en' => 'Integrated residential project comprising 500 housing units with modern facilities and advanced services, implemented using the latest construction technologies and high-quality CERAC materials.',
                'video_url' => 'https://youtube.com/watch?v=example1',
                'location_text' => 'الرياض، المملكة العربية السعودية',
                'latitude' => 24.7136000,
                'longitude' => 46.6753000,
                'client_id' => 1,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title_ar' => 'مركز الأعمال التجاري',
                'title_en' => 'Business Center',
                'description_ar' => 'مركز أعمال متطور يضم مكاتب إدارية ومحلات تجارية ومرافق خدمية، تم تصميمه ليكون نقطة جذب للاستثمارات التجارية في المنطقة.',
                'description_en' => 'Advanced business center comprising administrative offices, commercial shops and service facilities, designed to be an investment attraction point for commercial investments in the area.',
                'video_url' => 'https://youtube.com/watch?v=example2',
                'location_text' => 'جدة، المملكة العربية السعودية',
                'latitude' => 21.4858000,
                'longitude' => 39.1925000,
                'client_id' => 2,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title_ar' => 'المستشفى التخصصي الجديد',
                'title_en' => 'New Specialized Hospital',
                'description_ar' => 'مستشفى تخصصي حديث مجهز بأحدث التقنيات الطبية، يضم 200 سرير ومرافق طبية متطورة لخدمة المجتمع المحلي.',
                'description_en' => 'Modern specialized hospital equipped with the latest medical technologies, comprising 200 beds and advanced medical facilities to serve the local community.',
                'video_url' => 'https://youtube.com/watch?v=example3',
                'location_text' => 'الدمام، المملكة العربية السعودية',
                'latitude' => 26.4207000,
                'longitude' => 50.0888000,
                'client_id' => 3,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title_ar' => 'المجمع التعليمي المتكامل',
                'title_en' => 'Integrated Educational Complex',
                'description_ar' => 'مجمع تعليمي شامل يضم مدارس ومراكز تدريب ومعامل متطورة، مصمم ليكون مركزاً للتميز التعليمي في المنطقة.',
                'description_en' => 'Comprehensive educational complex comprising schools, training centers and advanced laboratories, designed to be a center of educational excellence in the region.',
                'video_url' => 'https://youtube.com/watch?v=example4',
                'location_text' => 'الخبر، المملكة العربية السعودية',
                'latitude' => 26.1792000,
                'longitude' => 50.1971000,
                'client_id' => 4,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'title_ar' => 'المنطقة الصناعية المتطورة',
                'title_en' => 'Advanced Industrial Zone',
                'description_ar' => 'منطقة صناعية حديثة مجهزة بأحدث البنى التحتية والتقنيات الصناعية، مصممة لجذب الاستثمارات الصناعية الكبرى.',
                'description_en' => 'Modern industrial zone equipped with the latest infrastructure and industrial technologies, designed to attract major industrial investments.',
                'video_url' => 'https://youtube.com/watch?v=example5',
                'location_text' => 'ينبع، المملكة العربية السعودية',
                'latitude' => 24.0897000,
                'longitude' => 38.0618000,
                'client_id' => 5,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 5,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}