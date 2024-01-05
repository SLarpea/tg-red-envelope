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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Nette\Utils\Random;

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
                'today_user' => [
                    'value' => $today_user,
                    'icon' => 'bi bi-person'
                ],
                'today_package' => [
                    'value' => $today_package,
                    'icon' => 'bi bi-file-earmark-zip'
                ],
                'today_outsourcing' => [
                    'value' => $today_outsourcing,
                    'icon' => 'bi bi-folder'
                ],
                'today_thunder_rate' => [
                    'value' => $today_thunder_rate,
                    'icon' => 'bi bi-lightning-charge'
                ],
                'today_profit' => [
                    'value' => $today_profit,
                    'icon' => 'bi bi-cash-coin'
                ],
                'today_rewards' => [
                    'value' => $today_rewards,
                    'icon' => 'bi bi-bookmark-star'
                ],
                'today_recharge' => [
                    'value' => $today_recharge,
                    'icon' => 'bi bi-box-arrow-in-right'
                ],
                'today_withdraw' => [
                    'value' => $today_withdraw,
                    'icon' => 'bi bi-box-arrow-left'
                ],
                'all_users' => [
                    'value' => $all_users,
                    'icon' => 'bi bi-people'
                ],
                'all_package' => [
                    'value' => $all_package,
                    'icon' => 'bi bi-archive'
                ],
                'all_outsourcing' => [
                    'value' => $all_outsourcing,
                    'icon' => 'bi bi-folder2-open'
                ],
                'all_rewards' => [
                    'value' => $all_rewards,
                    'icon' => 'bi bi-journal-bookmark'
                ],
                'all_recharge' => [
                    'value' => $all_recharge,
                    'icon' => 'bi bi-list-check'
                ],
                'all_withdraw' => [
                    'value' => $all_withdraw,
                    'icon' => 'bi bi-list-nested'
                ],
                'total_revenue' => [
                    'value' => $total_revenue,
                    'icon' => 'bi bi-piggy-bank'
                ],
            ]
        ];

        // Fetch chart data using request parameters
        $data['chartData'] = $this->getChartData();

        return $data;
    }

    // Function to retrieve and format chart data
    private function getChartData()
    {
        if (!Session::has('filter_chart_by_year')) {
            Session::put('filter_chart_by_year', now()->year);
        }

        $luckyHistoryActivity = DB::table('telegram_activity_view')
            ->select([
                DB::raw('MONTH(created_at) AS month'),
                DB::raw('COUNT(user_id) AS user_count'),
                DB::raw('MAX(chat_id) as chat_id'),
            ])
            ->whereYear('created_at', Session::get('filter_chart_by_year'))
            ->groupBy('month')
            ->groupBy(DB::raw('chat_id'))
            ->orderBy('chat_id')
            ->orderBy('month', 'asc');

        // Retrieve unique chat IDs from the query results
        $distinctedChatIds = $luckyHistoryActivity->get()->pluck('chat_id')->unique();

        // Retrieve all data for lucky history activities
        $dataLuckyHistoryActivities = $luckyHistoryActivity->get();

        // Organize data by month and chat ID
        $finalData = $this->setByMonthValue($distinctedChatIds, $dataLuckyHistoryActivities);

        // Return the formatted chart data
        return $finalData;
    }

    // Function to initialize an array with months as keys and 0 as default values
    private function getYearMonths()
    {
        $monthsOfYear = [];
        foreach (range(1, 12) as $month) {
            $monthsOfYear[$month] = 0;
        }
        return $monthsOfYear;
    }

    // Function to set user counts by month for each chat ID
    private function setByMonthValue($distinctedChatIds, $dataLuckyHistoryActivities)
    {
        $finalData = [];

        // Iterate through distinct chat IDs
        foreach ($distinctedChatIds as $groupId) {
            $finalData[$groupId]['series'] = $this->getYearMonths();

            // Iterate through lucky history activities data
            foreach ($dataLuckyHistoryActivities as $item) {
                // Check if the current item corresponds to the current chat ID
                if ($item->chat_id === $groupId) {
                    // Increment the user count for the corresponding month
                    if (isset($finalData[$groupId]['series'][$item->month])) {
                        $finalData[$groupId]['series'][$item->month] += $item->user_count;
                    }
                }
            }

            // Convert associative array to indexed array
            $finalData[$groupId]['series'] = array_values($finalData[$groupId]['series']);
        }

        // Return the final formatted data
        return $finalData;
    }
}
