<?php

namespace App\Services\Dashboard;

use Carbon\Carbon;
use App\Models\User;
use App\Models\LuckyMoney;

class DashboardService
{
    public function showData()
    {
        $today = Carbon::today();

        $data = [
            'dashboard' => [
                'today_user' => User::whereDate('created_at', $today)->count(),
                'today_package' => LuckyMoney::whereDate('created_at', $today)->count(),
                'today_outsourcing' => User::whereDate('created_at', $today)->count(),
                'today_thunder_rate' => User::whereDate('created_at', $today)->count(),
                'toda_profit' => User::whereDate('created_at', $today)->count(),
                'today_rewards' => User::whereDate('created_at', $today)->count(),
                'today_recharge' => User::whereDate('created_at', $today)->count(),
                'today_withdraw' => User::whereDate('created_at', $today)->count(),
                'all_users' => User::where('status', 1)->count(),
                'all_package' => LuckyMoney::all()->count(),
                'all_outsourcing' => User::whereDate('created_at', $today)->count(),
                'all_rewards' => User::whereDate('created_at', $today)->count(),
                'all_recharge' => User::whereDate('created_at', $today)->count(),
                'all_withdraw' => User::whereDate('created_at', $today)->count(),
                'total_revenue' => User::whereDate('created_at', $today)->count(),
            ]
        ];

        return $data;
    }

}
