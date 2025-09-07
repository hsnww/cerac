<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            [
                'name_ar' => 'شركة البناء المتقدم',
                'name_en' => 'Advanced Construction Co.',
                'description_ar' => 'شريكنا في مشاريع البناء والتشييد',
                'description_en' => 'Our partner in construction and building projects',
                'website_url' => 'https://www.advanced-construction.com',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name_ar' => 'مؤسسة التوزيع الحديث',
                'name_en' => 'Modern Distribution Foundation',
                'description_ar' => 'شريكنا في توزيع المنتجات',
                'description_en' => 'Our partner in product distribution',
                'website_url' => 'https://www.modern-dist.com',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name_ar' => 'شركة التقنيات الصناعية',
                'name_en' => 'Industrial Technologies Co.',
                'description_ar' => 'شريكنا في التقنيات الصناعية',
                'description_en' => 'Our partner in industrial technologies',
                'website_url' => 'https://www.industrial-tech.com',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name_ar' => 'مجموعة المقاولين المتحدين',
                'name_en' => 'United Contractors Group',
                'description_ar' => 'شريكنا في مشاريع المقاولات',
                'description_en' => 'Our partner in contracting projects',
                'website_url' => 'https://www.united-contractors.com',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name_ar' => 'شركة الخدمات اللوجستية',
                'name_en' => 'Logistics Services Co.',
                'description_ar' => 'شريكنا في الخدمات اللوجستية',
                'description_en' => 'Our partner in logistics services',
                'website_url' => 'https://www.logistics-services.com',
                'is_active' => true,
                'sort_order' => 5,
            ],
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }
    }
}


