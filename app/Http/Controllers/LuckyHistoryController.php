<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\Dashboard\LuckyHistoryService;

class LuckyHistoryController extends Controller
{
    protected $luckyHistoryService;

    public function __construct(LuckyHistoryService $luckyHistoryService)
    {
        $this->middleware('permission:user_management,view_lucky_history_user_management');

        $this->luckyHistoryService = $luckyHistoryService;
    }

    public function index(Request $request)
    {
        $data = $this->luckyHistoryService->showData($request);
        return Inertia::render('LuckyHistory', [
            'lucky' => $data['lucky'],
            'user_details' => $data['user_details'],
        ]);
    }
}
