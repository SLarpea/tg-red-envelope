<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\Dashboard\UserManagementService;

class UserManagementController extends Controller
{
    protected $userManagementService;

    public function __construct(UserManagementService $userManagementService)
    {
        $this->userManagementService = $userManagementService;
    }

    public function index(Request $request)
    {
        $data = $this->userManagementService->showData($request);
        return Inertia::render('UserManagement', [
            'tgusers' => $data['tgusers'],
            'filters' => $data['filters'],
            'response' => $data['response'],
        ]);
    }

    public function top_up(Request $request, string $id)
    {
        $this->userManagementService->recharge($request);
        $data = $this->userManagementService->showData($request);

        return redirect()->route('tg-users.index')->with('response', 'success');
    }
}
