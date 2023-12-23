<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\Dashboard\RechargeRecordService;

class RechargeRecordController extends Controller
{
    protected $rechargeRecordService;

    public function __construct(RechargeRecordService $rechargeRecordService)
    {
        $this->rechargeRecordService = $rechargeRecordService;
    }

    public function index(Request $request)
    {
        $data = $this->rechargeRecordService->showData($request);
        return Inertia::render('RechargeRecord', [
            'recharge' => $data['recharge'],
            'filters' => $data['filters'],
            'response' => $data['response'],
        ]);
    }
}
