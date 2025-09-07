<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Client;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        // Get clients for projects
        $clients = Client::all();
        
        if ($clients->isEmpty()) {
            // If no clients exist, create a default one
            $defaultClient = Client::create([
                'name_ar' => 'عميل تجريبي',
                'name_en' => 'Demo Client',
                'description_ar' => 'عميل تجريبي للمشاريع',
                'description_en' => 'Demo client for projects',
                'is_active' => true,
                'sort_order' => 1,
            ]);
            $clients = collect([$defaultClient]);
        }

        $projects = [
            [
                'title_ar' => 'مشروع مجمع سكني متكامل',
                'title_en' => 'Integrated Residential Complex Project',
                'description_ar' => 'تنفيذ مشروع مجمع سكني متكامل باستخدام أحدث تقنيات الغراء والمواد اللاصقة. تم تنفيذ المشروع على مساحة 50,000 متر مربع وشمل 200 وحدة سكنية.',
                'description_en' => 'Implementation of an integrated residential complex project using the latest adhesive and bonding technologies. The project was implemented on an area of 50,000 square meters and included 200 residential units.',
                'client_id' => $clients->random()->id,
                'project_type' => 'سكني',
                'location_ar' => 'الرياض، المملكة العربية السعودية',
                'location_en' => 'Riyadh, Saudi Arabia',
                'start_date' => '2023-01-15',
                'end_date' => '2023-12-30',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title_ar' => 'مصنع البتروكيماويات',
                'title_en' => 'Petrochemical Plant',
                'description_ar' => 'تطوير وتنفيذ مصنع بتروكيماويات متطور باستخدام مواد لاصقة مقاومة للمواد الكيميائية والحرارة العالية.',
                'description_en' => 'Development and implementation of an advanced petrochemical plant using chemical and high-temperature resistant adhesives.',
                'client_id' => $clients->random()->id,
                'project_type' => 'صناعي',
                'location_ar' => 'الجبيل، المملكة العربية السعودية',
                'location_en' => 'Jubail, Saudi Arabia',
                'start_date' => '2022-06-01',
                'end_date' => '2024-03-15',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title_ar' => 'مركز تجاري حديث',
                'title_en' => 'Modern Shopping Center',
                'description_ar' => 'بناء مركز تجاري حديث مع استخدام مواد لاصقة متخصصة للديكورات الداخلية والخارجية.',
                'description_en' => 'Construction of a modern shopping center with specialized adhesives for interior and exterior decorations.',
                'client_id' => $clients->random()->id,
                'project_type' => 'تجاري',
                'location_ar' => 'جدة، المملكة العربية السعودية',
                'location_en' => 'Jeddah, Saudi Arabia',
                'start_date' => '2023-03-01',
                'end_date' => '2024-01-30',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title_ar' => 'مستشفى متخصص',
                'title_en' => 'Specialized Hospital',
                'description_ar' => 'إنشاء مستشفى متخصص مع استخدام مواد لاصقة آمنة ومقاومة للبكتيريا.',
                'description_en' => 'Construction of a specialized hospital using safe and bacteria-resistant adhesives.',
                'client_id' => $clients->random()->id,
                'project_type' => 'صحي',
                'location_ar' => 'الدمام، المملكة العربية السعودية',
                'location_en' => 'Dammam, Saudi Arabia',
                'start_date' => '2022-09-01',
                'end_date' => '2024-06-30',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'title_ar' => 'مدرسة دولية',
                'title_en' => 'International School',
                'description_ar' => 'بناء مدرسة دولية مع استخدام مواد لاصقة صديقة للبيئة وآمنة للأطفال.',
                'description_en' => 'Construction of an international school using environmentally friendly and child-safe adhesives.',
                'client_id' => $clients->random()->id,
                'project_type' => 'تعليمي',
                'location_ar' => 'الخبر، المملكة العربية السعودية',
                'location_en' => 'Khobar, Saudi Arabia',
                'start_date' => '2023-07-01',
                'end_date' => '2024-08-31',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 5,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}


