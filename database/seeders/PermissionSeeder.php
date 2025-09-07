<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // حذف البيانات الموجودة مسبقاً
        Permission::query()->delete();
        
        $permissions = [
            // إدارة المستخدمين
            'users.view' => 'عرض المستخدمين',
            'users.create' => 'إنشاء مستخدمين',
            'users.edit' => 'تعديل المستخدمين',
            'users.delete' => 'حذف المستخدمين',
            
            // إدارة الأدوار
            'roles.view' => 'عرض الأدوار',
            'roles.create' => 'إنشاء أدوار',
            'roles.edit' => 'تعديل الأدوار',
            'roles.delete' => 'حذف الأدوار',
            
            // إدارة الصلاحيات
            'permissions.view' => 'عرض الصلاحيات',
            'permissions.create' => 'إنشاء صلاحيات',
            'permissions.edit' => 'تعديل الصلاحيات',
            'permissions.delete' => 'حذف الصلاحيات',
            
            // إدارة المنتجات
            'products.view' => 'عرض المنتجات',
            'products.create' => 'إنشاء منتجات',
            'products.edit' => 'تعديل المنتجات',
            'products.delete' => 'حذف المنتجات',
            
            // إدارة الشركاء
            'partners.view' => 'عرض الشركاء',
            'partners.create' => 'إنشاء شركاء',
            'partners.edit' => 'تعديل الشركاء',
            'partners.delete' => 'حذف الشركاء',
            
            // إدارة العملاء
            'clients.view' => 'عرض العملاء',
            'clients.create' => 'إنشاء عملاء',
            'clients.edit' => 'تعديل العملاء',
            'clients.delete' => 'حذف العملاء',
            
            // إدارة المشاريع
            'projects.view' => 'عرض المشاريع',
            'projects.create' => 'إنشاء مشاريع',
            'projects.edit' => 'تعديل المشاريع',
            'projects.delete' => 'حذف المشاريع',
            
            // إدارة الشرائح
            'hero_slides.view' => 'عرض الشرائح',
            'hero_slides.create' => 'إنشاء شرائح',
            'hero_slides.edit' => 'تعديل الشرائح',
            'hero_slides.delete' => 'حذف الشرائح',
            
            // إدارة النوافذ المنبثقة
            'popups.view' => 'عرض النوافذ المنبثقة',
            'popups.create' => 'إنشاء نوافذ منبثقة',
            'popups.edit' => 'تعديل النوافذ المنبثقة',
            'popups.delete' => 'حذف النوافذ المنبثقة',
            
            // إدارة إعدادات الموقع
            'site_settings.view' => 'عرض إعدادات الموقع',
            'site_settings.edit' => 'تعديل إعدادات الموقع',
        ];

        foreach ($permissions as $name => $displayName) {
            Permission::create([
                'name' => $name,
                'guard_name' => 'web',
            ]);
        }
    }
}
