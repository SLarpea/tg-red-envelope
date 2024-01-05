<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Services\Dashboard\DashboardService;

class DashboardController extends Controller
{
    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index()
    {
        $data = $this->dashboardService->showData();
        return Inertia::render('Dashboard', [
            'dashboard' => $data['dashboard'],
            'chart_data' => $data['chartData'],
            'current_year' => Session::get('current_year')
        ]);
    }

    public function filter(Request $request)
    {
        Session::put('filter_chart_by_year', $request->year);
        Session::put('current_year', $request->year);
    }
}
