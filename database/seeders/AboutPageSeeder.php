<?php

namespace Database\Seeders;

use App\Models\AboutFeature;
use App\Models\AboutPage;
use Illuminate\Database\Seeder;

class AboutPageSeeder extends Seeder
{
    public function run(): void
    {
        // Create or update the single AboutPage record
        $about = AboutPage::query()->firstOrCreate([], [
            'hero_title' => 'من نحن',
            'hero_subtitle' => 'مصنع مستقبل الغراء - رواد في مجال إنتاج الغراء والمواد اللاصقة',
            'hero_bg_color' => '#1cabe3',
            'hero_text_color' => '#0e183c',

            'about_title' => 'مصنع مستقبل الغراء',
            'about_paragraph_1' => 'نحن في سيراك نقدم حلولاً متكاملة في مجال مواد البناء والغراء عالية الجودة، مع التزامنا بالابتكار والتميز في كل منتج نقدمه. تأسس مصنعنا على أسس قوية من الخبرة والجودة لنكون شريككم الموثوق في مشاريعكم الإنشائية.',
            'about_paragraph_2' => 'نسعى دائماً لتقديم أفضل المنتجات التي تلبي احتياجات السوق السعودي والعربي، مع الحفاظ على أعلى معايير الجودة والسلامة في جميع مراحل الإنتاج والتوزيع.',

            'mission_title' => 'رؤيتنا',
            'mission_text' => 'أن نكون الرائدين في مجال إنتاج الغراء والمواد اللاصقة في المملكة العربية السعودية والمنطقة، مع التزامنا بتقديم منتجات عالية الجودة تلبي احتياجات السوق المحلي والعربي.',
            'vision_title' => 'رسالتنا',
            'vision_text' => 'تقديم حلول متكاملة في مجال مواد البناء والغراء عالية الجودة، مع التركيز على الابتكار والتميز في الخدمة، لضمان رضا عملائنا ونجاح مشاريعهم الإنشائية.',

            'cta_title' => 'هل تريد معرفة المزيد عنا؟',
            'cta_text' => 'تواصلوا معنا اليوم لمعرفة المزيد عن منتجاتنا وخدماتنا، ونحن سعداء لخدمتكم في جميع احتياجاتكم الإنشائية.',
            'cta_primary_text' => 'تواصل معنا',
            'cta_primary_url' => '/contact',
            'cta_secondary_text' => 'عرض منتجاتنا',
            'cta_secondary_url' => '/products',
        ]);

        // Reset and seed features
        $about->features()->delete();

        $features = [
            [
                'title' => 'جودة مضمونة',
                'text' => 'منتجاتنا تخضع لأعلى معايير الجودة',
                'icon_type' => 'heroicon',
                'heroicon_name' => 'check-badge',
                'sort_order' => 1,
            ],
            [
                'title' => 'سرعة في التوصيل',
                'text' => 'نضمن وصول طلباتكم في الوقت المحدد',
                'icon_type' => 'heroicon',
                'heroicon_name' => 'bolt',
                'sort_order' => 2,
            ],
            [
                'title' => 'خدمة عملاء متميزة',
                'text' => 'فريق متخصص لخدمتكم على مدار الساعة',
                'icon_type' => 'heroicon',
                'heroicon_name' => 'heart',
                'sort_order' => 3,
            ],
            [
                'title' => 'ابتكار مستمر',
                'text' => 'نطور منتجاتنا باستمرار لتلبية احتياجاتكم',
                'icon_type' => 'heroicon',
                'heroicon_name' => 'light-bulb',
                'sort_order' => 4,
            ],
        ];

        foreach ($features as $data) {
            $about->features()->create($data);
        }
    }
}


