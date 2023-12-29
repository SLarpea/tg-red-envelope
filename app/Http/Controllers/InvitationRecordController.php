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
        $this->invitationRecordService = $invitationRecordService;
    }

    public function index()
    {
        $data = $this->invitationRecordService->showData();
        return Inertia::render('InvitationRecord', [

        ]);
    }
}
