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
        $modules = [
            'dashboard' => [
                'view_dashboard',
            ],
            'group_management' => [
                'view_group_management',
                'create_group_management',
                'configure_group_management',
                'edit_group_management',
                'delete_group_management',
            ],
            'user_management' => [
                'view_user_management',
                'top_up_user_management',
                'withdraw_user_management',
                'view_invitation_record_user_management',
                'view_winning_record_user_management',
                'view_share_record_user_management',
                'view_personal_report_user_management',
                'view_funding_details_user_management',
                'view_lucky_history_user_management',
                'edit_user_management',
            ],
            'red_envelope_management' => [
                'view_red_envelope_management',
            ],
            'recharge_record' => [
                'view_recharge_record',
            ],
            'platform_commission_record' => [
                'view_platform_commission_record',
            ],
            'reward_record' => [
                'view_reward_record',
            ],
            'withdrawal_record' => [
                'view_withdrawal_record',
            ],
            'reports' => [
                'view_reports',
            ],
            'administrator' => [
                'view_administrator',
                'create_administrator',
                'edit_administrator',
                'delete_administrator',
            ],
            'role' => [
                'view_role',
                'create_role',
                'edit_role',
                'delete_role',
            ],
            'menu' => [
                'view_menu',
                'edit_menu',
            ],
            'operation_log' => [
                'view_operation_log',
            ],
            'permissions' => [
                'view_permissions',
            ],
        ];

        $permissionItems = [];

        foreach ($modules as $moduleName => $actions) {
            $permissionItems[] = [
                'name' => $moduleName,
                'guard_name' => 'sanctum',
                'status' => 1,
            ];
            foreach ($actions as $action) {
                $permissionItems[] = [
                    'name' => $action,
                    'guard_name' => 'sanctum',
                    'status' => 1,
                ];
            }
        }

        Permission::insert($permissionItems);
    }
}
