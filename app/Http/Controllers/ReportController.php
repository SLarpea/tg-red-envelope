<?php

namespace App\Http\Controllers;

use App\Models\GroupManagement;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\Dashboard\ReportServices;

class ReportController extends Controller
{
    protected $ReportServices;

    public function __construct(ReportServices $ReportServices)
    {
        $this->ReportServices = $ReportServices;
    }

    public function index(Request $request)
    {
        $data = $this->ReportServices->showData($request);
        return Inertia::render('Reports', [
            'users_reports' => $data['users_reports'] ?? [],
            'platform_commission_amount_reports' => $data['platform_commission_amount_reports'] ?? [],
            'lucky_money_reports' => $data['lucky_money_reports'] ?? [],
            'reward_amount_reports' => $data['reward_amount_reports'] ?? [],
            'group_ids' => $data['groupIds'],
            'response' => $data['response'],
        ]);
    }
}
