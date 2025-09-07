<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeroSlide;

class HeroSlideSeeder extends Seeder
{
    public function run(): void
    {
        $slides = [
            [
                'title_ar' => 'مرحباً بكم في سيراك',
                'title_en' => 'Welcome to Cerac',
                'subtitle_ar' => 'مصنع مستقبل الغراء',
                'subtitle_en' => 'The Future of Adhesives',
                'description_ar' => 'نقدم منتجات عالية الجودة من الغراء والمواد اللاصقة للصناعات المختلفة',
                'description_en' => 'We provide high-quality adhesives and bonding materials for various industries',
                'button_text_ar' => 'اكتشف منتجاتنا',
                'button_text_en' => 'Discover Our Products',
                'button_url' => '#products',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title_ar' => 'جودة لا مثيل لها',
                'title_en' => 'Unmatched Quality',
                'subtitle_ar' => 'منتجات متميزة للصناعات',
                'subtitle_en' => 'Premium Products for Industries',
                'description_ar' => 'نلتزم بأعلى معايير الجودة والابتكار لخدمة عملائنا',
                'description_en' => 'We are committed to the highest standards of quality and innovation to serve our customers',
                'button_text_ar' => 'تعرف علينا',
                'button_text_en' => 'About Us',
                'button_url' => '#about',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title_ar' => 'شركاء النجاح',
                'title_en' => 'Partners in Success',
                'subtitle_ar' => 'نعمل مع أفضل الشركات',
                'subtitle_en' => 'Working with the Best Companies',
                'description_ar' => 'نفتخر بشراكتنا مع كبرى الشركات في المملكة العربية السعودية',
                'description_en' => 'We are proud of our partnerships with major companies in Saudi Arabia',
                'button_text_ar' => 'شاهد أعمالنا',
                'button_text_en' => 'View Our Work',
                'button_url' => '/projects',
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($slides as $slide) {
            HeroSlide::create($slide);
        }
    }
}

