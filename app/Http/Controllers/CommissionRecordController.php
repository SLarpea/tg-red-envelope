<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\Dashboard\CommissionRecordService;

class CommissionRecordController extends Controller
{
    protected $commissionRecordService;

    public function __construct(CommissionRecordService $commissionRecordService)
    {
        $this->commissionRecordService = $commissionRecordService;
    }

    public function index(Request $request)
    {
        $data = $this->commissionRecordService->showData($request);
        return Inertia::render('CommissionRecord', [
            'commissions' => $data['commissions'],
            'filters' => $data['filters'],
            'response' => $data['response'],
        ]);
    }
}
