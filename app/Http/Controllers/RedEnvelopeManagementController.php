<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\Dashboard\RedEnvelopeManagementService;

class RedEnvelopeManagementController extends Controller
{
    protected $redEnvelopeManagementService;

    public function __construct(RedEnvelopeManagementService $redEnvelopeManagementService)
    {
        $this->middleware('permission:red_envelope_management')->only('index');

        $this->redEnvelopeManagementService = $redEnvelopeManagementService;
    }

    public function index(Request $request)
    {
        $data = $this->redEnvelopeManagementService->showData($request);
        return Inertia::render('RedEnvelopeManagement', [
            'envelopes' => $data['envelopes'],
            'filters' => $data['filters'],
            'response' => $data['response'],
        ]);
    }
}
