<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminData = [
            'name' => "Administrator",
            'email' => "admin@feiwin.com",
            'password' => Hash::make('password123'),
            'status' => 1,
        ];

        $admin = User::create($adminData);
        $admin->assignRole('Administrator');

        $userData = [
            'name' => "Administrator 2",
            'email' => "admin2@feiwin.com",
            'password' => Hash::make('password123'),
            'status' => 1,
        ];

        $user = User::create($userData);
        $user->assignRole('User');
    }
}
