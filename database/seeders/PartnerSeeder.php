<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // حذف البيانات الموجودة مسبقاً
        Partner::query()->delete();
        
        $partners = [
            [
                'name_ar' => 'شركة التوزيع المتخصصة',
                'name_en' => 'Specialized Distribution Co.',
                'website_url' => 'https://specialized-dist.com',
                'contact_phone' => '+966501234567',
                'contact_email' => 'info@specialized-dist.com',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name_ar' => 'مؤسسة التسويق الذكي',
                'name_en' => 'Smart Marketing Est.',
                'website_url' => 'https://smart-marketing.com',
                'contact_phone' => '+966501234568',
                'contact_email' => 'contact@smart-marketing.com',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name_ar' => 'شركة الخدمات اللوجستية',
                'name_en' => 'Logistics Services Co.',
                'website_url' => 'https://logistics-services.com',
                'contact_phone' => '+966501234569',
                'contact_email' => 'support@logistics-services.com',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name_ar' => 'مجموعة الموردين المحليين',
                'name_en' => 'Local Suppliers Group',
                'website_url' => 'https://local-suppliers.com',
                'contact_phone' => '+966501234570',
                'contact_email' => 'sales@local-suppliers.com',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name_ar' => 'شركة التطوير التقني',
                'name_en' => 'Technical Development Co.',
                'website_url' => 'https://tech-development.com',
                'contact_phone' => '+966501234571',
                'contact_email' => 'tech@tech-development.com',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 5,
            ],
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }
    }
}