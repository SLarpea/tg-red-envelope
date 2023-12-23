<?php

namespace App\Services\Dashboard;

use App\Models\CommissionRecord;
use App\Models\LuckyMoney;
use App\Models\RechargeRecord;
use App\Models\RewardRecord;
use App\Models\UserManagement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use App\Services\Dashboard\UserManagementService;
use App\Services\Dashboard\GroupManagementService;

class ReportService
{
    const ALL_REPORT = 0;
    const NUMBER_OF_REGISTERED_USERS = 1;
    const QUANTITY_OF_CONTRACT = 2;
    const PLATFORM_COMMISSION_AMOUNT = 3;
    const REWARD_AMOUNT = 4;

    private $groupManagementService;

    private $UserManagementService;

    public function __construct(GroupManagementService $groupManagementService, UserManagementService $UserManagementService)
    {
        $this->groupManagementService = $groupManagementService;
        $this->UserManagementService = $UserManagementService;
    }

    public function showData($request)
    {
        $data = [
            'groupIds' => $this->groupManagementService->getGroupIds(),
            'filters' => $request->only(['term', 'show', 'report_choice', 'group_id', 'start_date', 'end_date']),
            'response' => Session::get('response'),
            'users_reports' => [],
            'platform_commission_amount_reports' => [],
            'reward_amount_reports' => [],
            'lucky_money_reports' => [],
        ];

        if ($request->report_choice == self::NUMBER_OF_REGISTERED_USERS || $request->report_choice == self::ALL_REPORT) {
            $data['users_reports'] = self::getUsersReport($request);
        }

        if ($request->report_choice == self::QUANTITY_OF_CONTRACT || $request->report_choice == self::ALL_REPORT) {
            $data['lucky_money_reports'] = self::getLuckyMoneyReport($request);
        }

        if ($request->report_choice == self::PLATFORM_COMMISSION_AMOUNT || $request->report_choice == self::ALL_REPORT) {
            $data['platform_commission_amount_reports'] = self::getPlatformCommissionAmountReport($request);
        }

        if ($request->report_choice == self::REWARD_AMOUNT || $request->report_choice == self::ALL_REPORT) {
            $data['reward_amount_reports'] = self::getRewardAmountReport($request);
        }

        return $data;
    }

    public function getUsersReport($request)
    {
        $usersCountQuery = UserManagement::select([
            'group_id',
            DB::raw('COUNT(*) as total'),
        ])
            ->filterByDateCreated($request->start_date, $request->end_date);

        if ($request->filled('group_id')) {
            $usersCountQuery->filterByGroup($request->group_id);
        }

        // Group by 'group_id' and calculate the summation of 'total' column
        $summation = $usersCountQuery->groupBy('group_id')->pluck('total')->sum();

        // Paginate the results
        $result = $usersCountQuery->groupBy('group_id')->orderBy('group_id', 'asc')->paginate($request->show)->withQueryString();

        return [
            'query_result' => $result,
            'summation' => $summation,
        ];
    }

    public function getLuckyMoneyReport($request)
    {
        $luckMoney = LuckyMoney::select([
            'chat_id as group_id',
            DB::raw('COUNT(*) as total'),
        ])
            ->filterByDateCreated($request->start_date, $request->end_date);

        if ($request->filled('chat_id')) {
            $luckMoney->filterByChatId($request->chat_id);
        }

        // Group by 'chat_id' and calculate the summation of 'total' column
        $summation = $luckMoney->groupBy('chat_id')->pluck('total')->sum();

        // Paginate the results
        $result = $luckMoney->groupBy('chat_id')->orderBy('chat_id', 'asc')->paginate($request->show)->withQueryString();

        return [
            'query_result' => $result,
            'summation' => $summation,
        ];
    }

    public function getPlatformCommissionAmountReport($request)
    {
        $commissionRecord = CommissionRecord::select([
            'group_id',
            DB::raw('SUM(amount) as total'),
        ])
            ->filterByDateCreated($request->start_date, $request->end_date);

        if ($request->filled('group_id')) {
            $commissionRecord->filterByGroup($request->group_id);
        }

        // Group by 'group_id' and calculate the summation of 'total' column
        $summation = $commissionRecord->groupBy('group_id')->pluck('total')->sum();

        // Paginate the results
        $result = $commissionRecord->groupBy('group_id')->orderBy('group_id', 'asc')->paginate($request->show)->withQueryString();

        return [
            'query_result' => $result,
            'summation' => $summation,
        ];
    }

    public function getRewardAmountReport($request)
    {
        $rewardRecord = RewardRecord::select([
            'group_id',
            DB::raw('SUM(amount) as total'),
        ])
            ->filterByDateCreated($request->start_date, $request->end_date);

        if ($request->filled('group_id')) {
            $rewardRecord->filterByGroup($request->group_id);
        }

        // Group by 'group_id' and calculate the summation of 'total' column
        $summation = $rewardRecord->groupBy('group_id')->pluck('total')->sum();

        // Paginate the results
        $result = $rewardRecord->groupBy('group_id')->orderBy('group_id', 'asc')->paginate($request->show)->withQueryString();

        return [
            'query_result' => $result,
            'summation' => $summation,
        ];
    }
}
