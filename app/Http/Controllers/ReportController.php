<?php

namespace App\Http\Controllers;

use App\Models\GroupManagement;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\Dashboard\ReportService;

class ReportController extends Controller
{
    protected $reportService;

    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }

    public function index(Request $request)
    {
        $data = $this->reportService->showData($request);

        $reports = [
            'users_reports',
            'platform_commission_amount_reports',
            'lucky_money_reports',
            'reward_amount_reports',
        ];

        $renderData = [
            'group_ids' => $data['groupIds'],
            'response' => $data['response'],
        ];

        foreach ($reports as $report) {
            $queryResultKey = $report . '.query_result';
            $summationKey = $report . '.summation';

            $renderData[$report] = $data[$queryResultKey] ?? [];
            $renderData['summation'][$report] = $data[$summationKey] ?? 0;
        }

        return Inertia::render('Reports', $renderData);
    }
}
