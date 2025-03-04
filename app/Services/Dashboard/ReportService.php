<?php

namespace App\Services\Dashboard;

use App\Models\LuckyMoney;
use App\Domain\ReportDomain;
use App\Models\RewardRecord;
use App\Models\UserManagement;
use App\Models\CommissionRecord;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Services\Dashboard\UserManagementService;
use App\Services\Dashboard\GroupManagementService;

class ReportService
{
    private $groupManagementService;

    public function __construct(GroupManagementService $groupManagementService)
    {
        $this->groupManagementService = $groupManagementService;
    }

    public function showData($request)
    {
        // Get group IDs from the Group Management Service
        $groupIds = $this->groupManagementService->getGroupIds();

        // Extract relevant filters from the request
        $requestFilters = $request->only(['term', 'show', 'report_choice', 'group_id', 'start_date', 'end_date']);

        // Retrieve stored response from the session
        $response = Session::get('response');

        // Initialize arrays for different types of reports
        $usersReports = [];
        $luckyMoneyReports = [];
        $platformCommissionAmountReports = [];
        $rewardAmountReports = [];

        // Check the selected report choice and populate corresponding report arrays
        if ($request->report_choice == ReportDomain::NUMBER_OF_REGISTERED_USERS || $request->report_choice == ReportDomain::ALL_REPORT) {
            $usersReports = self::getUsersReport($request);
        }

        if ($request->report_choice == ReportDomain::QUANTITY_OF_CONTRACT || $request->report_choice == ReportDomain::ALL_REPORT) {
            $luckyMoneyReports = self::getLuckyMoneyReport($request);
        }

        if ($request->report_choice == ReportDomain::PLATFORM_COMMISSION_AMOUNT || $request->report_choice == ReportDomain::ALL_REPORT) {
            $platformCommissionAmountReports = self::getPlatformCommissionAmountReport($request);
        }

        if ($request->report_choice == ReportDomain::REWARD_AMOUNT || $request->report_choice == ReportDomain::ALL_REPORT) {
            $rewardAmountReports = self::getRewardAmountReport($request);
        }

        // Construct the final data array
        $data = [
            'groupIds' => $groupIds,
            'filters' => $requestFilters,
            'response' => $response,
            'users_reports' => $usersReports,
            'platform_commission_amount_reports' => $platformCommissionAmountReports,
            'reward_amount_reports' => $rewardAmountReports,
            'lucky_money_reports' => $luckyMoneyReports,
        ];

        return $data;
    }

    public function getUsersReport($request)
    {
        if ($request->filled('plf') && $request->plf == ReportDomain::NUMBER_OF_REGISTERED_USERS) {
            Session::put('users_reports_pagination', [
                'show' => $request->input('show', 10),
                'page' => $request->input('page', 1),
            ]);
        }

        // Retrieve pagination settings from the session
        $paginationSettings = Session::get('users_reports_pagination', [
            'show' => 10,
            'page' => 1,
        ]);

        $usersCountQuery = UserManagement::select([
            'group_id',
            DB::raw('COUNT(*) as total'),
        ])->filterByDateCreated($request->input('start_date'), $request->input('end_date'));

        if ($request->filled('group_id')) {
            $usersCountQuery->filterByGroup($request->input('group_id'));
        }

        // Group by 'group_id' and calculate the summation of 'total' column
        $summation = $usersCountQuery->groupBy('group_id')->pluck('total')->sum();

        // Paginate the results using the session values
        $result = $usersCountQuery->groupBy('group_id')
            ->orderBy('group_id', 'asc')
            ->paginate($paginationSettings['show'], ['*'], 'page', $paginationSettings['page'])
            ->withQueryString();


        // Start chart result
        $chartData = UserManagement::select([
            DB::raw("CONCAT(LPAD(MONTH(created_at), 2, '0'), '-', RIGHT(YEAR(created_at), 2)) AS month_year"),
            DB::raw('COUNT(*) AS total'),
            DB::raw('MAX(group_id) as group_id'),
        ])
            ->filterByDateCreated($request->input('start_date'), $request->input('end_date'))
            ->when($request->filled('group_id'), function ($q) use ($request) {
                $q->filterByGroup($request->input('group_id'));
            })
            ->groupBy(['group_id', 'month_year'])
            ->orderBy('month_year', 'asc')
            ->get();

        $chartDataArr = $chartData->toArray();

        $groupedData = [];

        foreach ($chartDataArr as $data) {
            $groupedData[$data['group_id']][$data['month_year']] = $data['total'];
        }

        $groupIds = array_keys($groupedData);
        $monthYears = getMonthYear($request->input('start_date'), $request->input('end_date'));

        $dataSeries = [];

        foreach ($groupIds as $groupId) {
            $MYdata = array_values(array_replace(array_fill_keys($monthYears, 0), $groupedData[$groupId] ?? []));
            $dataSeries[$groupId] = $MYdata;
        }
        // End chart result

        return [
            'query_result' => $result,
            'summation' => $summation,
            'series' => $dataSeries
        ];
    }

    public function getLuckyMoneyReport($request)
    {
        if ($request->filled('plf') && $request->plf == ReportDomain::QUANTITY_OF_CONTRACT) {
            Session::put('lucky_money_reports', [
                'show' => $request->input('show', 10),
                'page' => $request->input('page', 1),
            ]);
        }

        // Retrieve pagination settings from the session
        $paginationSettings = Session::get('lucky_money_reports', [
            'show' => 10,
            'page' => 1,
        ]);

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
        $result = $luckMoney->groupBy('chat_id')
            ->orderBy('chat_id', 'asc')
            ->paginate($paginationSettings['show'], ['*'], 'page', $paginationSettings['page'])
            ->withQueryString();


        // start chart result
        $chartData = LuckyMoney::select([
            'chat_id as group_id',
            DB::raw('COUNT(*) as total'),
            DB::raw("CONCAT(LPAD(MONTH(created_at), 2, '0'), '-', RIGHT(YEAR(created_at), 2)) AS month_year"),
        ])
            ->filterByDateCreated($request->input('start_date'), $request->input('end_date'))
            ->when($request->filled('group_id'), function ($q) use ($request) {
                $q->filterByChatId($request->input('group_id'));
            })
            ->groupBy(['group_id', 'month_year'])
            ->orderBy('month_year', 'asc')
            ->get();
        $chartDataArr = $chartData->toArray();

        $groupedData = [];

        foreach ($chartDataArr as $data) {
            $groupedData[$data['group_id']][$data['month_year']] = $data['total'];
        }

        $groupIds = array_keys($groupedData);
        $monthYears = getMonthYear($request->input('start_date'), $request->input('end_date'));

        $dataSeries = [];

        foreach ($groupIds as $groupId) {
            $MYdata = array_values(array_replace(array_fill_keys($monthYears, 0), $groupedData[$groupId] ?? []));
            $dataSeries[$groupId] = $MYdata;
        }
        // End chart result

        return [
            'query_result' => $result,
            'summation' => $summation,
            'series' => $dataSeries
        ];
    }

    public function getPlatformCommissionAmountReport($request)
    {
        if ($request->filled('plf') && $request->plf == ReportDomain::PLATFORM_COMMISSION_AMOUNT) {
            Session::put('platform_commission_amount_reports', [
                'show' => $request->input('show', 10),
                'page' => $request->input('page', 1),
            ]);
        }

        // Retrieve pagination settings from the session
        $paginationSettings = Session::get('platform_commission_amount_reports', [
            'show' => 10,
            'page' => 1,
        ]);

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
        $result = $commissionRecord
            ->groupBy('group_id')
            ->orderBy('group_id', 'asc')
            ->paginate($paginationSettings['show'], ['*'], 'page', $paginationSettings['page'])
            ->withQueryString();

        // start chart
        $chartData = CommissionRecord::select([
            'group_id',
            DB::raw('SUM(amount) as total'),
            DB::raw("CONCAT(LPAD(MONTH(created_at), 2, '0'), '-', RIGHT(YEAR(created_at), 2)) AS month_year"),
        ])
            ->filterByDateCreated($request->input('start_date'), $request->input('end_date'))
            ->when($request->filled('group_id'), function ($q) use ($request) {
                $q->filterByGroup($request->input('group_id'));
            })
            ->groupBy(['group_id', 'month_year'])
            ->orderBy('month_year', 'asc')
            ->get();
        $chartDataArr = $chartData->toArray();

        $groupedData = [];

        foreach ($chartDataArr as $data) {
            $groupedData[$data['group_id']][$data['month_year']] = $data['total'];
        }

        $groupIds = array_keys($groupedData);
        $monthYears = getMonthYear($request->input('start_date'), $request->input('end_date'));

        $dataSeries = [];

        foreach ($groupIds as $groupId) {
            $MYdata = array_values(array_replace(array_fill_keys($monthYears, 0), $groupedData[$groupId] ?? []));
            $dataSeries[$groupId] = $MYdata;
        }
        // End chart result

        return [
            'query_result' => $result,
            'summation' => $summation,
            'series' => $dataSeries
        ];
    }

    public function getRewardAmountReport($request)
    {
        if ($request->filled('plf') && $request->plf == ReportDomain::REWARD_AMOUNT) {
            Session::put('reward_amount_reports', [
                'show' => $request->input('show', 10),
                'page' => $request->input('page', 1),
            ]);
        }

        // Retrieve pagination settings from the session
        $paginationSettings = Session::get('reward_amount_reports', [
            'show' => 10,
            'page' => 1,
        ]);

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
        $result = $rewardRecord
            ->groupBy('group_id')
            ->orderBy('group_id', 'asc')
            ->paginate($paginationSettings['show'], ['*'], 'page', $paginationSettings['page'])
            ->withQueryString();

        // start chart
        $chartData = RewardRecord::select([
            'group_id',
            DB::raw('SUM(amount) as total'),
            DB::raw("CONCAT(LPAD(MONTH(created_at), 2, '0'), '-', RIGHT(YEAR(created_at), 2)) AS month_year"),
        ])
            ->filterByDateCreated($request->input('start_date'), $request->input('end_date'))
            ->when($request->filled('group_id'), function ($q) use ($request) {
                $q->filterByGroup($request->input('group_id'));
            })
            ->groupBy(['group_id', 'month_year'])
            ->orderBy('month_year', 'asc')
            ->get();
        $chartDataArr = $chartData->toArray();

        $groupedData = [];

        foreach ($chartDataArr as $data) {
            $groupedData[$data['group_id']][$data['month_year']] = $data['total'];
        }

        $groupIds = array_keys($groupedData);

        $monthYears = getMonthYear($request->input('start_date'), $request->input('end_date'));

        $dataSeries = [];

        foreach ($groupIds as $groupId) {
            $MYdata = array_values(array_replace(array_fill_keys($monthYears, 0), $groupedData[$groupId] ?? []));
            $dataSeries[$groupId] = $MYdata;
        }
        // End chart result

        return [
            'query_result' => $result,
            'summation' => $summation,
            'series' => $dataSeries
        ];
    }
}
