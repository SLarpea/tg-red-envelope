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
                'name' => 'view_dashboard',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'view_group_management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'can_add_in_group_management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'can_configure_in_group_management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'can_edit_in_group_management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'can_delete_in_group_management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'view_user_management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'can_top_up_in_user_management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'can_withdraw_in_user_management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'view_invitation_record_in_user_management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'can_view_winning_record_in_user_management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'can_view_share_record_in_user_management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'can_view_personal_report_in_user_management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'can_view_funding_details_in_user_management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'can_view_lucky_history_in_user_management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'can_edit_in_user_management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'view_red_envelope_management',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'view_recharge_record',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'view_platform_commission_record',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'view_reward_record',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'view_withdrawal_record',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'view_reports',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'view_administrator',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'can_add_in_administrator',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'can_edit_in_administrator',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'can_delete_in_administrator',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'view_role',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'can_add_in_role',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'can_edit_in_role',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'can_delete_in_role',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'view_menu',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'can_edit_in_menu',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'view_operation_log',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => 'view_permissions',
                'guard_name' => 'sanctum',
                'status' => 1,
            ],

        ];

        Permission::insert($permissionItems);
    }
}
