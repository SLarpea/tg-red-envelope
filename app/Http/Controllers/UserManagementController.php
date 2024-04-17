<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Requests\TopUpRequest;
use App\Http\Requests\WithdrawRequest;
use App\Services\Dashboard\UserManagementService;

class UserManagementController extends Controller
{
    protected $userManagementService;

    public function __construct(UserManagementService $userManagementService)
    {
        $this->middleware('permission:user_management')->only(['index']);
        $this->middleware('permission:edit_user_management')->only(['update']);
        $this->middleware('permission:top_up_user_management')->only(['top_up']);
        $this->middleware('permission:withdraw_user_management')->only(['withdraw']);

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

    public function update(Request $request, string $id)
    {
        if ($request->has('id')) {
            $this->userManagementService->updateData($request);
            return redirect()->route('tg-users.index')->with('response', 'success');
        }
    }

    public function top_up(TopUpRequest $request, string $id)
    {

        $this->userManagementService->recharge($request);
        $this->userManagementService->showData($request);

        return redirect()->route('tg-users.index')->with('response', 'success');
    }

    public function withdraw(WithdrawRequest $request, string $id)
    {
        $this->userManagementService->withdraw($request);
        $this->userManagementService->showData($request);

        return redirect()->route('tg-users.index')->with('response', 'success');
    }
}
