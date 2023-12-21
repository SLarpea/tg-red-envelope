<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\Dashboard\UserManagementServices;

class UserManagementController extends Controller
{
    protected $userManagementServices;

    public function __construct(UserManagementServices $userManagementServices)
    {
        $this->userManagementServices = $userManagementServices;
    }

    public function index(Request $request)
    {
        $data = $this->userManagementServices->showData($request);
        return Inertia::render('UserManagement', [
            'tgusers' => $data['tgusers'],
            'filters' => $data['filters'],
            'response' => $data['response'],
        ]);
    }

    public function top_up(Request $request, string $id)
    {
        $this->userManagementServices->recharge($request);
        $data = $this->userManagementServices->showData($request);

        return redirect()->route('tg-users.index')->with('response', 'success');
    }
}
