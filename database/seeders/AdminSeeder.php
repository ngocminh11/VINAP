<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admins')->updateOrInsert(
            [
                'email' => 'admin@vinap.vn',
            ],
            [
                'admin_code' => 'ADM001',
                'name' => 'Quản trị viên VINAP',
                'password' => Hash::make(
                    'Admin@VINAP2026!'
                ),
                'role' => 'super_admin',
                'is_active' => true,
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );


        DB::table('admins')->updateOrInsert(
            [
                'email' => 'staff@vinap.vn',
            ],
            [
                'admin_code' => 'STF001',
                'name' => 'Nhân viên VINAP',
                'password' => Hash::make(
                    'Staff@VINAP2026!'
                ),
                'role' => 'staff',
                'is_active' => true,
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );
    }
}