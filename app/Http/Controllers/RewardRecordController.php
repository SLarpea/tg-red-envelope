<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\Dashboard\RewardRecordService;

class RewardRecordController extends Controller
{
    protected $rewardRecordService;

    public function __construct(RewardRecordService $rewardRecordService)
    {
        $this->rewardRecordService = $rewardRecordService;
    }

    public function index(Request $request)
    {
        $data = $this->rewardRecordService->showData($request);
        return Inertia::render('RewardRecord', [
            'reward' => $data['reward'],
            'filters' => $data['filters'],
            'response' => $data['response'],
        ]);
    }
}
