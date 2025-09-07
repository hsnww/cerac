<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // حذف البيانات الموجودة مسبقاً
        Product::query()->delete();
        
        $products = [
            [
                'title_ar' => 'غراء سيراك الأبيض',
                'title_en' => 'CERAC White Adhesive',
                'description_ar' => 'غراء بناء عالي الجودة للاستخدامات العامة في البناء والتشييد',
                'description_en' => 'High-quality construction adhesive for general building and construction applications',
                'features_ar' => '["مقاوم للماء والرطوبة", "قوة لصق عالية", "سريع الجفاف", "مناسب لجميع أنواع الأسطح", "سهولة التطبيق"]',
                'features_en' => '["Water and moisture resistant", "High bonding strength", "Fast drying", "Suitable for all surface types", "Easy application"]',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title_ar' => 'غراء سيراك الرمادي',
                'title_en' => 'CERAC Gray Adhesive',
                'description_ar' => 'غراء متخصص للاستخدامات الصناعية والتجارية',
                'description_en' => 'Specialized adhesive for industrial and commercial applications',
                'features_ar' => '["مقاوم للعوامل الجوية", "مناسب للاستخدام الخارجي", "متانة عالية", "مقاوم للتآكل", "قوة ضغط ممتازة"]',
                'features_en' => '["Weather resistant", "Suitable for outdoor use", "High durability", "Corrosion resistant", "Excellent compressive strength"]',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title_ar' => 'معجون سد الشقوق',
                'title_en' => 'Crack Filling Paste',
                'description_ar' => 'معجون مرن عالي الجودة لسد الشقوق والفواصل في الجدران والأسقف',
                'description_en' => 'High-quality flexible paste for filling cracks and gaps in walls and ceilings',
                'features_ar' => '["مرن ومقاوم للتشقق", "مقاوم للماء", "سهولة التشكيل", "لون أبيض نقي", "مقاوم للعفن والفطريات"]',
                'features_en' => '["Flexible and crack resistant", "Water resistant", "Easy to shape", "Pure white color", "Mold and fungus resistant"]',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title_ar' => 'ترويبة',
                'title_en' => 'Trowel Mix',
                'description_ar' => 'مادة لاصقة متخصصة للاستخدام مع المجرفة',
                'description_en' => 'Specialized adhesive for use with trowel application',
                'features_ar' => '["مناسب للتطبيق بالمجرفة", "قوام مناسب للعمل", "جفاف سريع", "قوة لصق عالية", "مقاوم للانزلاق"]',
                'features_en' => '["Suitable for trowel application", "Workable consistency", "Fast drying", "High bonding strength", "Slip resistant"]',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'title_ar' => 'سوبر سيراك',
                'title_en' => 'Super CERAC',
                'description_ar' => 'غراء فائق القوة للاستخدامات المتخصصة والصعبة',
                'description_en' => 'Ultra-strength adhesive for specialized and demanding applications',
                'features_ar' => '["قوة لصق فائقة", "مقاوم للعوامل القاسية", "مناسب للاستخدامات الصناعية", "متانة طويلة الأمد", "مقاوم للحرارة العالية"]',
                'features_en' => '["Ultra bonding strength", "Resistant to harsh conditions", "Suitable for industrial use", "Long-term durability", "High temperature resistant"]',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'title_ar' => 'غالون سيراك',
                'title_en' => 'CERAC Gallon',
                'description_ar' => 'عبوة كبيرة الحجم للاستخدامات التجارية والصناعية',
                'description_en' => 'Large volume container for commercial and industrial use',
                'features_ar' => '["حجم اقتصادي", "مناسب للمشاريع الكبيرة", "توفير في التكلفة", "سهولة التخزين", "عبوة مقاومة"]',
                'features_en' => '["Economical size", "Suitable for large projects", "Cost effective", "Easy storage", "Durable container"]',
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}