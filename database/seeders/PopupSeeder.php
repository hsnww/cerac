<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Popup;

class PopupSeeder extends Seeder
{
    public function run(): void
    {
        // Poster popup
        $posterPopup = Popup::create([
            'title' => 'مرحباً بكم في سيراك',
            'type' => 'poster',
            'content' => 'اكتشفوا منتجاتنا المتميزة من الغراء والمواد اللاصقة عالية الجودة',
            'button_text' => 'استكشف المنتجات',
            'button_url' => '#products',
            'show_close_button' => true,
            'auto_close' => false,
            'show_once_per_session' => true,
            'width' => 800,
            'height' => 600,
            'position' => 'center',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        // Add placeholder image using Spatie Media
        $posterPopup->addMediaFromUrl('https://via.placeholder.com/800x600/3b82f6/ffffff?text=مرحباً+بكم+في+سيراك')
            ->toMediaCollection('popup_images');

        // YouTube video popup
        Popup::create([
            'title' => 'شاهد فيديو عن منتجاتنا',
            'type' => 'youtube',
            'youtube_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'button_text' => 'شاهد الآن',
            'button_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'show_close_button' => true,
            'auto_close' => true,
            'auto_close_delay' => 15,
            'show_once_per_session' => false,
            'width' => 900,
            'height' => 600,
            'position' => 'center',
            'is_active' => true,
            'sort_order' => 2,
        ]);

        // Contact form popup
        Popup::create([
            'title' => 'تواصل معنا',
            'type' => 'form',
            'content' => 'هل لديك استفسار أو تريد معرفة المزيد عن منتجاتنا؟',
            'form_action' => '/contact',
            'form_fields' => [
                [
                    'name' => 'name',
                    'label' => 'الاسم',
                    'type' => 'text',
                    'required' => true,
                    'placeholder' => 'أدخل اسمك'
                ],
                [
                    'name' => 'email',
                    'label' => 'البريد الإلكتروني',
                    'type' => 'email',
                    'required' => true,
                    'placeholder' => 'أدخل بريدك الإلكتروني'
                ],
                [
                    'name' => 'phone',
                    'label' => 'رقم الهاتف',
                    'type' => 'tel',
                    'required' => false,
                    'placeholder' => 'أدخل رقم هاتفك'
                ],
                [
                    'name' => 'message',
                    'label' => 'الرسالة',
                    'type' => 'textarea',
                    'required' => true,
                    'placeholder' => 'اكتب رسالتك هنا'
                ]
            ],
            'button_text' => 'إغلاق',
            'button_url' => null,
            'show_close_button' => true,
            'auto_close' => false,
            'show_once_per_session' => true,
            'width' => 600,
            'height' => 700,
            'position' => 'center',
            'is_active' => true,
            'sort_order' => 3,
        ]);

        // Survey popup
        Popup::create([
            'title' => 'استطلاع رأي',
            'type' => 'survey',
            'content' => 'نقدر آراءكم! شاركونا رأيكم في خدماتنا',
            'form_action' => '/survey',
            'form_fields' => [
                [
                    'name' => 'satisfaction',
                    'label' => 'كيف تقيم خدماتنا؟',
                    'type' => 'select',
                    'required' => true,
                    'placeholder' => 'اختر تقييمك'
                ],
                [
                    'name' => 'suggestions',
                    'label' => 'اقتراحاتكم',
                    'type' => 'textarea',
                    'required' => false,
                    'placeholder' => 'شاركونا اقتراحاتكم'
                ]
            ],
            'button_text' => 'إغلاق',
            'button_url' => null,
            'show_close_button' => true,
            'auto_close' => true,
            'auto_close_delay' => 30,
            'show_once_per_session' => true,
            'width' => 500,
            'height' => 600,
            'position' => 'center',
            'is_active' => true,
            'sort_order' => 4,
        ]);

        // Custom content popup
        Popup::create([
            'title' => 'عرض خاص',
            'type' => 'custom',
            'content' => '<div class="text-center p-8"><h3 class="text-2xl font-bold text-blue-600 mb-4">عرض خاص!</h3><p class="text-lg text-gray-700 mb-6">احصل على خصم 20% على جميع منتجاتنا هذا الشهر</p><div class="bg-yellow-100 p-4 rounded-lg"><p class="text-yellow-800 font-semibold">استخدم كود الخصم: CERAC20</p></div></div>',
            'button_text' => 'اطلب الآن',
            'button_url' => '#products',
            'show_close_button' => true,
            'auto_close' => true,
            'auto_close_delay' => 20,
            'show_once_per_session' => false,
            'width' => 500,
            'height' => 400,
            'position' => 'center',
            'is_active' => true,
            'sort_order' => 5,
        ]);
    }
}


