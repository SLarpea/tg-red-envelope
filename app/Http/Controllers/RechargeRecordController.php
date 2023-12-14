<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\RechargeRecordServices;

class RechargeRecordController extends Controller
{
    protected $RechargeRecordServices;

    public function __construct(RechargeRecordServices $RechargeRecordServices)
    {
        $this->RechargeRecordServices = $RechargeRecordServices;
    }

    public function index(Request $request)
    {
        $data = $this->RechargeRecordServices->showData($request);
        return Inertia::render('RechargeRecord', [
            'recharge' => $data['recharge'],
            'filters' => $data['filters'],
            'response' => $data['response'],
        ]);
    }
}
