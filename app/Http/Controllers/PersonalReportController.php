<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\Dashboard\PersonalReportService;

class PersonalReportController extends Controller
{
    protected $personalReportService;

    public function __construct(PersonalReportService $personalReportService)
    {
        $this->personalReportService = $personalReportService;
    }

    public function index()
    {
        $data = $this->personalReportService->showData();
        return Inertia::render('PersonalReport', [

        ]);
    }
}
