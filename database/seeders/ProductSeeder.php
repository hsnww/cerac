<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name_ar' => 'غراء البناء الأبيض',
                'name_en' => 'White Construction Adhesive',
                'description_ar' => 'غراء عالي الجودة للبناء والديكور، مقاوم للماء والرطوبة',
                'description_en' => 'High-quality adhesive for construction and decoration, water and moisture resistant',
                'features_ar' => ['مقاوم للماء', 'قوة لصق عالية', 'سريع الجفاف', 'آمن للاستخدام'],
                'features_en' => ['Water resistant', 'High bonding strength', 'Quick drying', 'Safe to use'],
                'specifications_ar' => ['الوزن: 500 جرام', 'مدة الصلاحية: 24 شهر', 'درجة الحرارة: -10°C إلى +60°C'],
                'specifications_en' => ['Weight: 500g', 'Shelf life: 24 months', 'Temperature: -10°C to +60°C'],
                'price' => 25.00,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name_ar' => 'غراء الخشب المتخصص',
                'name_en' => 'Specialized Wood Glue',
                'description_ar' => 'غراء مخصص للأخشاب، يوفر قوة لصق استثنائية',
                'description_en' => 'Specialized wood glue that provides exceptional bonding strength',
                'features_ar' => ['قوة لصق عالية', 'شفاف بعد الجفاف', 'مقاوم للرطوبة', 'سهل التطبيق'],
                'features_en' => ['High bonding strength', 'Transparent when dry', 'Moisture resistant', 'Easy to apply'],
                'specifications_ar' => ['الوزن: 250 مل', 'مدة الصلاحية: 18 شهر', 'درجة الحرارة: -5°C إلى +50°C'],
                'specifications_en' => ['Weight: 250ml', 'Shelf life: 18 months', 'Temperature: -5°C to +50°C'],
                'price' => 18.50,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name_ar' => 'غراء السيراميك',
                'name_en' => 'Ceramic Adhesive',
                'description_ar' => 'غراء قوي للسيراميك والبلاط، مقاوم للماء والحرارة',
                'description_en' => 'Strong adhesive for ceramics and tiles, water and heat resistant',
                'features_ar' => ['مقاوم للماء', 'مقاوم للحرارة', 'قوة تحمل عالية', 'لون أبيض'],
                'features_en' => ['Water resistant', 'Heat resistant', 'High load capacity', 'White color'],
                'specifications_ar' => ['الوزن: 1 كيلو', 'مدة الصلاحية: 12 شهر', 'درجة الحرارة: -15°C إلى +80°C'],
                'specifications_en' => ['Weight: 1kg', 'Shelf life: 12 months', 'Temperature: -15°C to +80°C'],
                'price' => 45.00,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name_ar' => 'غراء المعادن',
                'name_en' => 'Metal Adhesive',
                'description_ar' => 'غراء متخصص للمعادن، يوفر لصق قوي ودائم',
                'description_en' => 'Specialized metal adhesive that provides strong and durable bonding',
                'features_ar' => ['قوة لصق استثنائية', 'مقاوم للتآكل', 'سريع الجفاف', 'متعدد الاستخدامات'],
                'features_en' => ['Exceptional bonding strength', 'Corrosion resistant', 'Quick drying', 'Multi-purpose'],
                'specifications_ar' => ['الوزن: 300 مل', 'مدة الصلاحية: 36 شهر', 'درجة الحرارة: -20°C إلى +120°C'],
                'specifications_en' => ['Weight: 300ml', 'Shelf life: 36 months', 'Temperature: -20°C to +120°C'],
                'price' => 35.00,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name_ar' => 'غراء البلاستيك',
                'name_en' => 'Plastic Adhesive',
                'description_ar' => 'غراء مخصص للبلاستيك، يوفر لصق قوي ومرن',
                'description_en' => 'Specialized plastic adhesive that provides strong and flexible bonding',
                'features_ar' => ['مرن بعد الجفاف', 'مقاوم للمواد الكيميائية', 'شفاف', 'سهل التطبيق'],
                'features_en' => ['Flexible when dry', 'Chemical resistant', 'Transparent', 'Easy to apply'],
                'specifications_ar' => ['الوزن: 200 مل', 'مدة الصلاحية: 24 شهر', 'درجة الحرارة: -10°C إلى +70°C'],
                'specifications_en' => ['Weight: 200ml', 'Shelf life: 24 months', 'Temperature: -10°C to +70°C'],
                'price' => 22.00,
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name_ar' => 'غراء الألياف الزجاجية',
                'name_en' => 'Fiberglass Adhesive',
                'description_ar' => 'غراء متخصص للألياف الزجاجية والمواد المركبة',
                'description_en' => 'Specialized adhesive for fiberglass and composite materials',
                'features_ar' => ['قوة عالية', 'مقاوم للعوامل الجوية', 'دائم', 'متعدد الاستخدامات'],
                'features_en' => ['High strength', 'Weather resistant', 'Durable', 'Multi-purpose'],
                'specifications_ar' => ['الوزن: 500 مل', 'مدة الصلاحية: 18 شهر', 'درجة الحرارة: -30°C إلى +100°C'],
                'specifications_en' => ['Weight: 500ml', 'Shelf life: 18 months', 'Temperature: -30°C to +100°C'],
                'price' => 55.00,
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}


