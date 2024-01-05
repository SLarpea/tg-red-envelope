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
                'zh_CN_name' => '仪表板',
                'url' => 'dashboard',
                'sort' => 0,
                'status' => 1,
            ],
            [
                'name' => 'Group Management',
                'zh_CN_name' => '小组管理',
                'url' => 'groups',
                'sort' => 1,
                'status' => 1,
            ],
            [
                'name' => 'User Management',
                'zh_CN_name' => '用户管理',
                'url' => 'tg-users',
                'sort' => 2,
                'status' => 1,
            ],
            [
                'name' => 'Red Envelope Management',
                'zh_CN_name' => '红色信封管理',
                'url' => 'red-envelopes',
                'sort' => 3,
                'status' => 1,
            ],
            [
                'name' => 'Recharge Record',
                'zh_CN_name' => '充电记录',
                'url' => 'recharge',
                'sort' => 4,
                'status' => 1,
            ],
            [
                'name' => 'Platform Commission Record',
                'zh_CN_name' => '平台委员会记录',
                'url' => 'commissions',
                'sort' => 5,
                'status' => 1,
            ],
            [
                'name' => 'Reward Record',
                'zh_CN_name' => '奖励记录',
                'url' => 'rewards',
                'sort' => 6,
                'status' => 1,
            ],
            [
                'name' => 'Withdrawal Record',
                'zh_CN_name' => '提款记录',
                'url' => 'withdraw',
                'sort' => 7,
                'status' => 1,
            ],
            [
                'name' => 'Report',
                'zh_CN_name' => '报告',
                'url' => 'reports',
                'sort' => 8,
                'status' => 1,
            ],
            [
                'name' => 'Administrator',
                'zh_CN_name' => '行政人员',
                'url' => 'administrator',
                'sort' => 9,
                'status' => 1,
            ],
            [
                'name' => 'Role',
                'zh_CN_name' => '角色',
                'url' => 'roles',
                'sort' => 10,
                'status' => 1,
            ],
            [
                'name' => 'Permissions',
                'zh_CN_name' => '权限',
                'url' => 'permissions',
                'sort' => 11,
                'status' => 1,
            ],
            [
                'name' => 'Operating log',
                'zh_CN_name' => '操作日志',
                'url' => 'operation-log',
                'sort' => 12,
                'status' => 1,
            ],

        ];

        Menu::insert($menuItems);
    }
}
