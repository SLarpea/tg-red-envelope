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
                'name' => '查看仪表板',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '查看组管理',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '可以添加小组管理',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '可以在组管理中配置',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '可以在小组管理中编辑',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '可以在小组管理中删除',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '查看用户管理',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '可以在用户管理中加油',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '可以退出用户管理',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '查看用户管理中的邀请记录',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '可以在用户管理中查看获胜记录',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '可以在用户管理中查看共享记录',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '可以在用户管理中查看个人报告',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '可以在用户管理中查看资金细节',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '可以在用户管理中查看幸运历史记录',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '可以在用户管理中编辑',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '查看红色信封管理',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '查看补给记录',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '查看平台委员会记录',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '查看奖励记录',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '查看提款记录',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '查看报告',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '查看管理员',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '可以添加管理员',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '可以在管理员中编辑',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '可以在管理员中删除',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '查看角色',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '可以添加角色',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '可以编辑角色',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '可以删除角色',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '查看菜单',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '可以在菜单中编辑',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
            [
                'name' => '查看操作日志',
                'guard_name ' => 'sanctum',
                'status' => 1,
            ],
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
