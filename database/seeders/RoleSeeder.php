<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->generateAdministrator();
        $this->generateUser();
    }

    private function generateAdministrator()
    {
        $role = Role::create([
            'name' => 'Administrator',
            'status' => 1,
        ]);
        $allPermissions = Permission::pluck('name');
        $role->syncPermissions($allPermissions);
    }

    private function generateUser()
    {
        $role = Role::create([
            'name' => 'User',
            'status' => 1,
        ]);

        $permissionNames = ['dashboard', 'reports'];

        $permissions = Permission::whereIn('name', $permissionNames)->get();

        $role->syncPermissions($permissions);
    }
}
