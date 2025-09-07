<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // حذف البيانات الموجودة مسبقاً
        User::query()->delete();
        
        // إنشاء المستخدمين
        $users = [
            [
                'name' => 'مدير عام',
                'email' => 'superadmin@cerac.com',
                'password' => Hash::make('password'),
                'role' => 'super-admin',
            ],
            [
                'name' => 'مدير النظام',
                'email' => 'admin@cerac.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'محرر المحتوى',
                'email' => 'editor@cerac.com',
                'password' => Hash::make('password'),
                'role' => 'editor',
            ],
            [
                'name' => 'مشاهد',
                'email' => 'viewer@cerac.com',
                'password' => Hash::make('password'),
                'role' => 'viewer',
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => $userData['password'],
                'email_verified_at' => now(),
            ]);

            // تعيين الدور للمستخدم
            $role = Role::where('name', $userData['role'])->first();
            if ($role) {
                $user->assignRole($role);
            }
        }
    }
}
