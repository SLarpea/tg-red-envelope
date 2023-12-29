<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\Dashboard\FundingDetailService;

class FundingDetailController extends Controller
{
    protected $fundingDetailService;

    public function __construct(FundingDetailService $fundingDetailService)
    {
        $this->fundingDetailService = $fundingDetailService;
    }

    public function index()
    {
        $data = $this->fundingDetailService->showData();
        return Inertia::render('FundingDetails', [

        ]);
    }
}
