<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Сброс кеша
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Создаём permissions
        $permissions = [
            'view dashboard',
            'create posts',
            'edit posts',
            'delete posts',
            'publish posts',
            'manage users',
            'manage roles',
            'view analytics',
            'manage settings',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // 1. Super Admin — полный доступ
        $superAdmin = Role::firstOrCreate(['name' => 'super-admin']);
        $superAdmin->syncPermissions(Permission::all());
    
        // 2. Admin — управление контентом и пользователями
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->syncPermissions([
            'view dashboard',
            'create posts',
            'edit posts',
            'delete posts',
            'publish posts',
            'manage users',
            'view analytics',
        ]);

        // 3. Editor — создание и редактирование контента
        $editor = Role::firstOrCreate(['name' => 'editor']);
        $editor->syncPermissions([
            'view dashboard',
            'create posts',
            'edit posts',
            'publish posts',
        ]);

        // 4. Viewer — только просмотр
        $viewer = Role::firstOrCreate(['name' => 'viewer']);
        $viewer->syncPermissions([
            'view dashboard',
        ]);
    }
}
