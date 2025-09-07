<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // حذف البيانات الموجودة مسبقاً
        Role::query()->delete();
        
        // إنشاء الأدوار
        $roles = [
            'super-admin' => 'مدير عام',
            'admin' => 'مدير',
            'editor' => 'محرر',
            'viewer' => 'مشاهد',
        ];

        foreach ($roles as $name => $displayName) {
            Role::create([
                'name' => $name,
                'guard_name' => 'web',
            ]);
        }

        // ربط الصلاحيات بالأدوار
        $this->assignPermissionsToRoles();
    }

    private function assignPermissionsToRoles()
    {
        // مدير عام - جميع الصلاحيات
        $superAdminRole = Role::where('name', 'super-admin')->first();
        $superAdminRole->givePermissionTo(Permission::all());

        // مدير - صلاحيات الإدارة
        $adminRole = Role::where('name', 'admin')->first();
        $adminPermissions = [
            'users.view', 'users.create', 'users.edit',
            'products.view', 'products.create', 'products.edit',
            'partners.view', 'partners.create', 'partners.edit',
            'clients.view', 'clients.create', 'clients.edit',
            'projects.view', 'projects.create', 'projects.edit',
            'hero_slides.view', 'hero_slides.create', 'hero_slides.edit',
            'popups.view', 'popups.create', 'popups.edit',
            'site_settings.view', 'site_settings.edit',
        ];
        $adminRole->givePermissionTo($adminPermissions);

        // محرر - صلاحيات التعديل
        $editorRole = Role::where('name', 'editor')->first();
        $editorPermissions = [
            'products.view', 'products.create', 'products.edit',
            'partners.view', 'partners.create', 'partners.edit',
            'clients.view', 'clients.create', 'clients.edit',
            'projects.view', 'projects.create', 'projects.edit',
            'hero_slides.view', 'hero_slides.create', 'hero_slides.edit',
            'popups.view', 'popups.create', 'popups.edit',
        ];
        $editorRole->givePermissionTo($editorPermissions);

        // مشاهد - صلاحيات العرض فقط
        $viewerRole = Role::where('name', 'viewer')->first();
        $viewerPermissions = [
            'users.view',
            'products.view',
            'partners.view',
            'clients.view',
            'projects.view',
            'hero_slides.view',
            'popups.view',
            'site_settings.view',
        ];
        $viewerRole->givePermissionTo($viewerPermissions);
    }
}
