<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Events\PusherBroadcast;
use Illuminate\Support\Facades\Session;
use App\Services\Dashboard\DashboardService;
use App\Services\Dashboard\NotificationService;

class DashboardController extends Controller
{
    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->middleware('permission:dashboard');

        $this->dashboardService = $dashboardService;
    }

    public function index(Request $request)
    {
        $data = $this->dashboardService->showData();
        return Inertia::render('Dashboard', [
            'dashboard' => $data['dashboard'],
            'chart_data' => $data['chartData']
        ]);
    }
}
