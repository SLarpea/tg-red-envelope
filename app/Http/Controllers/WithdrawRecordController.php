<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\Dashboard\WithdrawRecordServices;

class WithdrawRecordController extends Controller
{
    protected $WithdrawRecordServices;

    public function __construct(WithdrawRecordServices $WithdrawRecordServices)
    {
        $this->WithdrawRecordServices = $WithdrawRecordServices;
    }

    public function index(Request $request)
    {
        $data = $this->WithdrawRecordServices->showData($request);
        return Inertia::render('WithdrawalsRecord', [
            'withdraw' => $data['withdraw'],
            'filters' => $data['filters'],
            'response' => $data['response'],
        ]);
    }
}
