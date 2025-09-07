<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // حذف البيانات الموجودة مسبقاً
        Client::query()->delete();
        
        $clients = [
            [
                'name_ar' => 'شركة البناء الحديث',
                'name_en' => 'Modern Construction Co.',
                'website_url' => 'https://modern-construction.com',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name_ar' => 'مؤسسة المقاولات المتقدمة',
                'name_en' => 'Advanced Contracting Est.',
                'website_url' => 'https://advanced-contracting.com',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name_ar' => 'شركة الإنشاءات الكبرى',
                'name_en' => 'Major Construction Co.',
                'website_url' => 'https://major-construction.com',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name_ar' => 'مجموعة المشاريع المتكاملة',
                'name_en' => 'Integrated Projects Group',
                'website_url' => 'https://integrated-projects.com',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name_ar' => 'شركة التطوير العقاري',
                'name_en' => 'Real Estate Development Co.',
                'website_url' => 'https://real-estate-dev.com',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name_ar' => 'مؤسسة البناء المستدام',
                'name_en' => 'Sustainable Building Est.',
                'website_url' => 'https://sustainable-building.com',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'name_ar' => 'شركة المشاريع الكبرى',
                'name_en' => 'Mega Projects Co.',
                'website_url' => 'https://mega-projects.com',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 7,
            ],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}