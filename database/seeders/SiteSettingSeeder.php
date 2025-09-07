<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        SiteSetting::create([
            'site_name' => 'سيراك',
            'site_description' => 'مصنع مستقبل الغراء - نقدم منتجات عالية الجودة من الغراء والمواد اللاصقة للصناعات المختلفة. نحن نلتزم بأعلى معايير الجودة والابتكار لخدمة عملائنا.',
            'site_keywords' => 'غراء، مواد لاصقة، بناء، صناعة، سيراك',
            'logo_url' => null,
            'favicon_url' => null,
            'contact_phone' => '+966 50 123 4567',
            'contact_email' => 'info@cerac.com',
            'contact_address' => 'الرياض، المملكة العربية السعودية',
            'facebook_url' => 'https://facebook.com/cerac',
            'twitter_url' => 'https://twitter.com/cerac',
            'instagram_url' => 'https://instagram.com/cerac',
            'linkedin_url' => 'https://linkedin.com/company/cerac',
            'youtube_url' => 'https://youtube.com/cerac',
            'about_text' => 'نحن شركة رائدة في مجال تصنيع الغراء والمواد اللاصقة، نقدم حلول مبتكرة للصناعات المختلفة.',
            'services_text' => 'نقدم مجموعة واسعة من منتجات الغراء والمواد اللاصقة عالية الجودة.',
            'working_hours' => 'السبت - الخميس: 8:00 ص - 6:00 م',
            'is_active' => true,
        ]);
    }
}
