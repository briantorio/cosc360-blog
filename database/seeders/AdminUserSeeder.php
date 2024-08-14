<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'BriAdmin',
            'email' => 'bri@admin.com',
            'password' => Hash::make('admin1234'),
            'role' => User::ROLE_ADMIN, // Set the role to admin
        ]);
    }
}

