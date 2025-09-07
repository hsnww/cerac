<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HeroSlide;

class HeroSlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // حذف البيانات الموجودة مسبقاً
        HeroSlide::query()->delete();
        
        $heroSlides = [
            [
                'title' => 'مرحباً بكم في سيراك',
                'subtitle' => 'مصنع مستقبل الغراء',
                'description' => 'نحن نقدم أفضل منتجات الغراء ومواد البناء عالية الجودة لجميع احتياجاتكم الإنشائية',
                'button_text' => 'اكتشف منتجاتنا',
                'button_url' => '#products',
                'button_text_2' => 'تواصل معنا',
                'button_url_2' => '#contact',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'جودة لا تضاهى',
                'subtitle' => 'منتجات مضمونة',
                'description' => 'جميع منتجاتنا تخضع لمعايير الجودة العالمية وتضمن لكم أفضل النتائج في مشاريعكم',
                'button_text' => 'عرض الكتالوج',
                'button_url' => '#catalog',
                'button_text_2' => 'طلب عينة',
                'button_url_2' => '#samples',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'شركاء النجاح',
                'subtitle' => 'معاً نحو التميز',
                'description' => 'نعمل مع أفضل الشركات والمقاولين لتقديم حلول متكاملة لجميع مشاريع البناء والتشييد',
                'button_text' => 'كن شريكنا',
                'button_url' => '#partnership',
                'button_text_2' => 'مشاريعنا',
                'button_url_2' => '#projects',
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($heroSlides as $slide) {
            HeroSlide::create($slide);
        }
    }
}