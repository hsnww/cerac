<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            [
                'name_ar' => 'شركة أرامكو السعودية',
                'name_en' => 'Saudi Aramco',
                'description_ar' => 'أكبر شركة نفط في العالم',
                'description_en' => 'The world\'s largest oil company',
                'website_url' => 'https://www.aramco.com',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name_ar' => 'الخطوط الجوية السعودية',
                'name_en' => 'Saudi Airlines',
                'description_ar' => 'الناقل الوطني للمملكة العربية السعودية',
                'description_en' => 'The national carrier of Saudi Arabia',
                'website_url' => 'https://www.saudia.com',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name_ar' => 'شركة سابك',
                'name_en' => 'SABIC',
                'description_ar' => 'شركة البتروكيماويات الرائدة عالمياً',
                'description_en' => 'Global leader in petrochemicals',
                'website_url' => 'https://www.sabic.com',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name_ar' => 'شركة الكهرباء السعودية',
                'name_en' => 'Saudi Electricity Company',
                'description_ar' => 'مزود الكهرباء الرئيسي في المملكة',
                'description_en' => 'Main electricity provider in the Kingdom',
                'website_url' => 'https://www.se.com.sa',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name_ar' => 'شركة المياه الوطنية',
                'name_en' => 'National Water Company',
                'description_ar' => 'مزود خدمات المياه والصرف الصحي',
                'description_en' => 'Water and wastewater services provider',
                'website_url' => 'https://www.nwc.com.sa',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name_ar' => 'شركة الاتصالات السعودية',
                'name_en' => 'Saudi Telecom Company',
                'description_ar' => 'مزود خدمات الاتصالات الرائد',
                'description_en' => 'Leading telecommunications services provider',
                'website_url' => 'https://www.stc.com.sa',
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'name_ar' => 'شركة الراجحي للاستثمار',
                'name_en' => 'Al Rajhi Investment',
                'description_ar' => 'شركة استثمارية رائدة',
                'description_en' => 'Leading investment company',
                'website_url' => 'https://www.alrajhi.com',
                'is_active' => true,
                'sort_order' => 7,
            ],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}


