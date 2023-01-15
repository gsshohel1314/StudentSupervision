<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'super.admin@gmail.com',
            'role_id' => 4,
            'phone' => '01723114477',
            'status' => 1,
            'password' => '$2y$10$MhAXfSlfDW8K1Ah7sadBJOlCHUfECIBrYdGhN0if67rwJAjJlQnxK',
        ]);
    }
}
