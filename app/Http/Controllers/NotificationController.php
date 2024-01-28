<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\Dashboard\NotificationService;

class NotificationController extends Controller
{
    private $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function index(Request $request)
    {
        $data = $this->notificationService->showData($request);
        return Inertia::render('Notifications', [
            'notifications_list' => $data['notifications'],
            'filters' => $data['filters'],
            'response' => $data['response'],
        ]);
    }

    public function store(Request $request)
    {
        $response = $this->notificationService->store($request->all());
        return redirect()->back()->with('response', 'success');
    }

    public function markAsRead(Request $request, $id)
    {
        $response = $this->notificationService->markAsRead($id);
    }
}
