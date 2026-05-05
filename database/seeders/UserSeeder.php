<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Super Admin
        $superAdmin = User::firstOrCreate(
            ['email' => 'superadmin@test.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password123'),
            ]
        );
        $superAdmin->assignRole('super-admin');

        // Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password123'),
            ]
        );
        $admin->assignRole('admin');

        // Editor
        $editor = User::firstOrCreate(
            ['email' => 'editor@test.com'],
            [
                'name' => 'Editor',
                'password' => Hash::make('password123'),
            ]
        );
        $editor->assignRole('editor');

        // Viewer
        $viewer = User::firstOrCreate(
            ['email' => 'viewer@test.com'],
            [
                'name' => 'Viewer',
                'password' => Hash::make('password123'),
            ]
        );
        $viewer->assignRole('viewer');
    }
}