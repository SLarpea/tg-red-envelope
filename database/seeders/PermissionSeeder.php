<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionItems = [
            [
                'name' => 'View Dashboard',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'View Group Management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'Can Add in Group Management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'Can Configure in Group Management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'Can Edit in Group Management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'Can Delete in Group Management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'View User Management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'Can Top Up in User Management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'Can Withdraw in User Management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'View Invitation Record in User Management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'Can View Winning Record in User Management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'Can View Share Record in User Management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'Can View Personal Report in User Management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'Can View Funding Details in User Management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'Can View Lucky History in User Management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'Can Edit in User Management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'View Red Envelope Management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'View Recharge Record',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'View Platform Commission Record',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'View Reward Record',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'View Withdrawal Record',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'View Reports',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'View Administrator',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'Can Add in Administrator',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'Can Edit in Administrator',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'Can Delete in Administrator',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'View Role',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'Can Add in Role',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'Can Edit in Role',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'Can Delete in Role',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'View Menu',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'Can Edit in Menu',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'View Operation Log',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'View Permissions',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],

        ];

        Permission::insert($permissionItems);
    }
}
