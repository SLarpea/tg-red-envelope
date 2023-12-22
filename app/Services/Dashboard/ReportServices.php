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
use App\Services\Dashboard\UserManagementServices;
use App\Services\Dashboard\GroupManagementServices;

class ReportServices
{
    const ALL_REPORT = 0;
    const NUMBER_OF_REGISTERED_USERS = 1;
    const QUANTITY_OF_CONTRACT = 2;
    const PLATFORM_COMMISSION_AMOUNT = 3;
    const REWARD_AMOUNT = 4;

    private $groupManagementService;

    private $userManagementServices;

    public function __construct(GroupManagementServices $groupManagementService, UserManagementServices $userManagementServices)
    {
        $this->groupManagementService = $groupManagementService;
        $this->userManagementServices = $userManagementServices;
    }

    public function showData($request)
    {
        $data = [
            'groupIds' => $this->groupManagementService->getGroupIds(),
            'recharge' => RechargeRecord::when($request->term, function ($query, $term) {
                $query->where('username', 'LIKE', '%' . $term . '%');
            })->orderBy('id', 'asc')->paginate($request->show)->withQueryString(),
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

        return $usersCountQuery->groupBy('group_id')->orderBy('group_id', 'asc')->paginate($request->show)->withQueryString();
    }

    public function getLuckyMoneyReport($request)
    {
        $luckMoney = LuckyMoney::select([
            'chat_id as group_id',
            DB::raw('COUNT(*) as total'),
        ])
            ->filterByDateCreated($request->start_date, $request->end_date);

        if ($request->filled('chat_id')) {
            $luckMoney->filterByChatId($request->group_id);
        }

        return $luckMoney->groupBy('chat_id')->orderBy('chat_id', 'asc')->paginate($request->show)->withQueryString();
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

        return $commissionRecord->groupBy('group_id')->orderBy('group_id', 'asc')->paginate($request->show)->withQueryString();
    }

    public function getRewardAmountReport($request)
    {
        $commissionRecord = RewardRecord::select([
            'group_id',
            DB::raw('SUM(amount) as total'),
        ])
            ->filterByDateCreated($request->start_date, $request->end_date);

        if ($request->filled('group_id')) {
            $commissionRecord->filterByGroup($request->group_id);
        }

        return $commissionRecord->groupBy('group_id')->orderBy('group_id', 'asc')->paginate($request->show)->withQueryString();
    }
}
