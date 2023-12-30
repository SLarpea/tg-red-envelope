<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userItem = [
            [
                'name' => 'Super Admin',
                'email' => 'admin@feiwin.com',
                'password' => Hash::make('password123'),
                'status' => 1,
            ],

        ];

        User::insert($userItem);
    }
}
