<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // حذف البيانات الموجودة مسبقاً
        SiteSetting::query()->delete();
        
        SiteSetting::create([
            'site_name' => 'سيراك',
            'site_description' => 'مصنع مستقبل الغراء - منتجات عالية الجودة للبناء والتشييد',
            'site_keywords' => '["سيراك","غراء","مواد بناء","تشييد","السعودية","مواد لاصقة","بناء","تطوير"]',
            'contact_phone' => '+966 50 123 4567',
            'contact_email' => 'info@cerac.com',
            'contact_address' => 'الخبر، المملكة العربية السعودية',
            'facebook_url' => 'https://facebook.com/cerac',
            'twitter_url' => 'https://twitter.com/cerac',
            'linkedin_url' => 'https://linkedin.com/company/cerac',
            'instagram_url' => 'https://instagram.com/cerac',
            'youtube_url' => 'https://youtube.com/cerac',
            'about_text' => 'رواد مجال إنتاج الغراء والمواد اللاصقة عالية الجودة للبناء والتشييد. نسعى لتقديم أفضل المنتجات والخدمات لعملائنا الكرام.',
            'services_text' => 'نقدم مجموعة شاملة من منتجات الغراء والمواد اللاصقة المتخصصة للاستخدامات المختلفة في البناء والتشييد.',
        ]);
    }
}