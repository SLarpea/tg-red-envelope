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
        $this->luckyHistoryService = $luckyHistoryService;
    }

    public function index()
    {
        $data = $this->luckyHistoryService->showData();
        return Inertia::render('LuckyHistory', [

        ]);
    }
}
