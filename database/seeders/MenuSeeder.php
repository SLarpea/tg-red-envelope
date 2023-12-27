<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menuItems = [
            [
                'name' => 'Dashboard',
                'url' => 'dashboard',
                'sort' => 0,
                'status' => 1,
            ],
            [
                'name' => 'Group management',
                'url' => 'groups',
                'sort' => 1,
                'status' => 1,
            ],
            [
                'name' => 'User Management',
                'url' => 'tg-users',
                'sort' => 2,
                'status' => 1,
            ],
            [
                'name' => 'Red Envelope Management',
                'url' => 'red-envelopes',
                'sort' => 3,
                'status' => 1,
            ],
            [
                'name' => 'Recharge Record',
                'url' => 'recharge',
                'sort' => 4,
                'status' => 1,
            ],
            [
                'name' => 'Platform Commission Record',
                'url' => 'commissions',
                'sort' => 5,
                'status' => 1,
            ],
            [
                'name' => 'Reward Record',
                'url' => 'rewards',
                'sort' => 6,
                'status' => 1,
            ],
            [
                'name' => 'Withdrawal Record',
                'url' => 'withdraw',
                'sort' => 7,
                'status' => 1,
            ],
            [
                'name' => 'Reports',
                'url' => 'reports',
                'sort' => 8,
                'status' => 1,
            ],
            [
                'name' => 'Administrator',
                'url' => 'administrator',
                'sort' => 9,
                'status' => 1,
            ],
            [
                'name' => 'Roles',
                'url' => 'roles',
                'sort' => 10,
                'status' => 1,
            ],
            [
                'name' => 'Permissions',
                'url' => 'permissions',
                'sort' => 11,
                'status' => 1,
            ],
            [
                'name' => 'Operation Log',
                'url' => 'operation-log',
                'sort' => 12,
                'status' => 1,
            ],

        ];

        Menu::insert($menuItems);
    }
}
