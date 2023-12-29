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

    public function index(Request $request)
    {
        $data = $this->fundingDetailService->showData($request);
        return Inertia::render('FundingDetails', [
            'funding' => $data['funding'],
        ]);
    }
}
