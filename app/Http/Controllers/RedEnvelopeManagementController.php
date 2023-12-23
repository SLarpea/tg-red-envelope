<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\Dashboard\RedEnvelopeManagementServices;

class RedEnvelopeManagementController extends Controller
{
    protected $RedEnvelopeManagementServices;

    public function __construct(RedEnvelopeManagementServices $RedEnvelopeManagementServices)
    {
        $this->RedEnvelopeManagementServices = $RedEnvelopeManagementServices;
    }

    public function index(Request $request)
    {
        $data = $this->RedEnvelopeManagementServices->showData($request);
        return Inertia::render('RedEnvelopeManagement', [
            'envelopes' => $data['envelopes'],
            'filters' => $data['filters'],
            'response' => $data['response'],
        ]);
    }
}
