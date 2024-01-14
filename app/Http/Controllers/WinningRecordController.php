<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\Dashboard\WinningRecordService;

class WinningRecordController extends Controller
{
    protected $winningRecordService;

    public function __construct(WinningRecordService $winningRecordService)
    {
        $this->middleware('permission:user_management,view_winning_record_user_management');

        $this->winningRecordService = $winningRecordService;
    }

    public function index(Request $request)
    {
        $data = $this->winningRecordService->showData($request);
        return Inertia::render('WinningRecord', [
            'winning' => $data['winning'],
            'user_details' => $data['user_details'],
        ]);
    }
}
