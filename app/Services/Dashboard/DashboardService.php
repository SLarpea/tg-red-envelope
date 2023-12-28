<?php

namespace App\Services\Dashboard;

use Carbon\Carbon;
use App\Models\User;
use App\Models\LuckyMoney;
use App\Models\LuckyHistory;
use App\Models\RewardRecord;
use App\Models\RechargeRecord;
use App\Models\UserManagement;
use App\Models\WithdrawRecord;
use App\Models\CommissionRecord;

class DashboardService
{
    public function showData()
    {
        $today = Carbon::today();

        // Today User
        $today_user = UserManagement::query()->where('created_at', '>', Carbon::now()->startOfDay())->where('created_at', '<', Carbon::now()->endOfDay())->count();
        // Today packages
        $today_package = LuckyMoney::query()->where('created_at', '>', Carbon::now()->startOfDay())->where('created_at', '<', Carbon::now()->endOfDay())->count();
        // Today outsourcing
        $today_outsourcing = LuckyMoney::query()->where('created_at', '>', Carbon::now()->startOfDay())->where('created_at', '<', Carbon::now()->endOfDay())->sum('amount');
        // Today Mine Rate
        $arr = LuckyHistory::query()->selectRaw('count(*) as countThunder,is_thunder')->where('created_at', '>', Carbon::now()->startOfDay())->where('created_at', '<', Carbon::now()->endOfDay())->groupBy('is_thunder')->get();
        $is_thunder_0 = 0;
        $is_thunder_1 = 0;
        foreach ($arr as $val) {
            if ($val['is_thunder'] == 0) {
                $is_thunder_0 = $val['countThunder'];
            } else {
                $is_thunder_1 = $val['countThunder'];
            }
        }
        $today_thunder_rate = 0;
        if ($is_thunder_1 > 0 || $is_thunder_0 > 0) {
            $today_thunder_rate = round(($is_thunder_1 / ($is_thunder_1 + $is_thunder_0)) * 100, 2);
        }
        //Today Profit
        $todayCommission_profit = CommissionRecord::query()->where('created_at', '>', Carbon::now()->startOfDay())->where('created_at', '<', Carbon::now()->endOfDay())->sum('amount');
        $todayReward_profit = RewardRecord::query()->where('created_at', '>', Carbon::now()->startOfDay())->where('created_at', '<', Carbon::now()->endOfDay())->sum('amount');
        $dif_profit = $todayCommission_profit - $todayReward_profit;
        $today_profit = $todayCommission_profit . ' - ' . $todayReward_profit . ' = ' . $dif_profit;
        //Today Rewards
        $today_rewards = RewardRecord::query()->where('created_at', '>', Carbon::now()->startOfDay())->where('created_at', '<', Carbon::now()->endOfDay())->sum('amount');
        //Today Recharge
        $today_recharge = RechargeRecord::query()->where('created_at', '>', Carbon::now()->startOfDay())->where('created_at', '<', Carbon::now()->endOfDay())->sum('amount');
        //Today Withdraw
        $today_withdraw = WithdrawRecord::query()->where('created_at', '>', Carbon::now()->startOfDay())->where('created_at', '<', Carbon::now()->endOfDay())->sum('amount');
        //All Users
        $all_users = UserManagement::query()->count();
        //All Package
        $all_package  = LuckyMoney::query()->count();
        //All Outsourcing
        $all_outsourcing = LuckyMoney::query()->sum('amount');
        //All Rewards
        $all_rewards = RewardRecord::query()->sum('amount');
        //All Recharge
        $all_recharge = RewardRecord::query()->sum('amount');
        //All Withdraw
        $all_withdraw = WithdrawRecord::query()->sum('amount');
        //All Revenue
        $commission_revenue = CommissionRecord::query()->sum('amount');
        $reward_revenue = RewardRecord::query()->sum('amount');
        $dif_revenue = $commission_revenue - $reward_revenue;
        $total_revenue = $commission_revenue . ' - ' . $reward_revenue . ' = ' . $dif_revenue;

        $data = [
            'dashboard' => [
                'today_user' => $today_user,
                'today_package' => $today_package,
                'today_outsourcing' => $today_outsourcing,
                'today_thunder_rate' => $today_thunder_rate,
                'today_profit' => $today_profit,
                'today_rewards' => $today_rewards,
                'today_recharge' => $today_recharge,
                'today_withdraw' => $today_withdraw,
                'all_users' => $all_users,
                'all_package' => $all_package,
                'all_outsourcing' => $all_outsourcing,
                'all_rewards' => $all_rewards,
                'all_recharge' => $all_recharge,
                'all_withdraw' => $all_withdraw,
                'total_revenue' => $total_revenue,
            ]
        ];

        return $data;
    }

}
