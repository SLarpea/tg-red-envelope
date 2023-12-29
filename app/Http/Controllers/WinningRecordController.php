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
        $this->winningRecordService = $winningRecordService;
    }

    public function index()
    {
        $data = $this->winningRecordService->showData();
        return Inertia::render('WinningRecord', [

        ]);
    }
}
