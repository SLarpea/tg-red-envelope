<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\Dashboard\CommissionRecordServices;

class CommissionRecordController extends Controller
{
    protected $CommissionRecordServices;

    public function __construct(CommissionRecordServices $CommissionRecordServices)
    {
        $this->CommissionRecordServices = $CommissionRecordServices;
    }

    public function index(Request $request)
    {
        $data = $this->CommissionRecordServices->showData($request);
        return Inertia::render('CommissionRecord', [
            'recharge' => $data['recharge'],
            'filters' => $data['filters'],
            'response' => $data['response'],
        ]);
    }
}
