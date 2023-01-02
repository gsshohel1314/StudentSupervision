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
            'role_name' => 'Teacher',
            'role_status' => 1,
        ]);

        UserRole::create([
            'role_name' => 'Student',
            'role_status' => 1,
        ]);
    }
}
