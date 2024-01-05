<?php

namespace App\Http\Controllers;

use App\Services\Dashboard\DashboardService;
use Inertia\Inertia;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index(Request $request)
    {
        $data = $this->dashboardService->showData($request);
        return Inertia::render('Dashboard', [
            'dashboard' => $data['dashboard'],
            'chart_data' => $data['chartData']
        ]);
    }
}
