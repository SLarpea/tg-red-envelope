<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\UserManagementServices;

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
}
