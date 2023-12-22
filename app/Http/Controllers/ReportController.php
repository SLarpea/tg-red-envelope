<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\Dashboard\ReportServices;

class ReportController extends Controller
{
    protected $ReportServices;

    public function __construct(ReportServices $ReportServices)
    {
        $this->ReportServices = $ReportServices;
    }

    public function index(Request $request)
    {
        return Inertia::render('Reports');
    }
}
