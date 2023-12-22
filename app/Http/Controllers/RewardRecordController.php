<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\Dashboard\RewardRecordServices;

class RewardRecordController extends Controller
{
    protected $RewardRecordServices;

    public function __construct(RewardRecordServices $RewardRecordServices)
    {
        $this->RewardRecordServices = $RewardRecordServices;
    }

    public function index(Request $request)
    {
        $data = $this->RewardRecordServices->showData($request);
        return Inertia::render('RewardRecord', [
            'reward' => $data['reward'],
            'filters' => $data['filters'],
            'response' => $data['response'],
        ]);
    }
}
