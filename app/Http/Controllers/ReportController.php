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
        return Inertia::render('Reports', [
            'users_reports' => $data['users_reports']['query_result'] ?? [],
            'platform_commission_amount_reports' => $data['platform_commission_amount_reports']['query_result'] ?? [],
            'lucky_money_reports' => $data['lucky_money_reports']['query_result'] ?? [],
            'reward_amount_reports' => $data['reward_amount_reports']['query_result'] ?? [],
            'summation' => [
                'users_reports' => $data['users_reports']['summation'] ?? 0,
                'platform_commission_amount_reports' => $data['platform_commission_amount_reports']['summation'] ?? 0,
                'lucky_money_reports' => $data['lucky_money_reports']['summation'] ?? 0,
                'reward_amount_reports' => $data['reward_amount_reports']['summation'] ?? 0,
            ],
            'group_ids' => $data['groupIds'],
            'response' => $data['response'],
        ]);
    }
}
