<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\Dashboard\InvitationRecordService;

class InvitationRecordController extends Controller
{
    protected $invitationRecordService;

    public function __construct(InvitationRecordService $invitationRecordService)
    {
        $this->middleware('permission:user_management|view_invitation_record_user_management')->only(['index']);

        $this->invitationRecordService = $invitationRecordService;
    }

    public function index(Request $request)
    {
        $data = $this->invitationRecordService->showData($request);
        return Inertia::render('InvitationRecord', [
            'invites' => $data['invites'],
            'user_details' => $data['user_details'],
        ]);
    }
}
