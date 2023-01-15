<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRoleTableSeeder extends Seeder
{
    public function run()
    {
        UserRole::create([
            'role_id' => 1,
            'role_name' => 'Admin',
            'role_status' => 1,
        ]);

        UserRole::create([
            'role_id' => 2,
            'role_name' => 'Teacher',
            'role_status' => 1,
        ]);

        UserRole::create([
            'role_id' => 3,
            'role_name' => 'Student',
            'role_status' => 1,
        ]);
        
        UserRole::create([
            'role_id' => 4,
            'role_name' => 'Super Admin',
            'role_status' => 1,
        ]);
    }
}
