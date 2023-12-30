<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Services\Dashboard\PersonalReportService;

class PersonalReportController extends Controller
{
    protected $personalReportService;

    public function __construct(PersonalReportService $personalReportService)
    {
        $this->personalReportService = $personalReportService;
    }

    private function listOfAllReportsTypes(){
        return [
            'luck_num',
            'luck_num_thunder',
            'lucky_history',
            'lucky_history_thunder',
            'lucky_amount',
            'lucky_thunder_amount',
            'lucky_history_amount',
            'lucky_history_thunder_amount',
            'invite_amount',
            'reward_amount',
            'share_amount',
            'recharge_amount',
            'withdraw_amount',
            'commission_amount',
            'to_share_amount',
            'jackpot_amount',
            'profit_amount',
        ];
    }

    public function index(Request $request)
    {

        if ($request->method() == "POST") {
            Session::put("$request->reportType", $request->optionType);
        } else {
            $reportTypes = $this->listOfAllReportsTypes();
            $sessionedoptionTypes = [];

            foreach ($reportTypes as $report) {
                $sessionedoptionTypes[$report] = Session::get($report) ?? 1;
            }

            $data = $this->personalReportService->showData();
            return Inertia::render('PersonalReport', [
                'response' => Session::get('response'),
                'reportOptionValue' => $sessionedoptionTypes,
                'data' => $data,
                'filters' => $request->only(['tg_id']),
            ]);
        }
    }
}
