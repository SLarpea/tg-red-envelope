<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\Dashboard\WithdrawRecordService;

class WithdrawRecordController extends Controller
{
    protected $withdrawRecordService;

    public function __construct(WithdrawRecordService $withdrawRecordService)
    {
        $this->middleware('permission:withdrawal_record')->only('index');

        $this->withdrawRecordService = $withdrawRecordService;
    }

    public function index(Request $request)
    {
        $data = $this->withdrawRecordService->showData($request);
        return Inertia::render('WithdrawalsRecord', [
            'withdraw' => $data['withdraw'],
            'filters' => $data['filters'],
            'response' => $data['response'],
        ]);
    }
}
