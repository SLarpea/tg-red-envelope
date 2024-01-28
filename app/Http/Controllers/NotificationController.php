<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\Dashboard\NotificationService;

class NotificationController extends Controller
{
    private $notificationService;

    public function __construct(NotificationService $notificationService) {
        $this->notificationService = $notificationService;
    }

    public function store(Request $request){
        $response = $this->notificationService->store($request->all());
        return redirect()->back()->with('response', 'success');
    }

    public function markAsRead(Request $request, $id){
        $response = $this->notificationService->markAsRead($id);
    }
}
