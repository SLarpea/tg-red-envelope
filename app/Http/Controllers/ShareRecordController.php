<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\Dashboard\ShareRecordService;

class ShareRecordController extends Controller
{
    protected $shareRecordService;

    public function __construct(ShareRecordService $shareRecordService)
    {
        $this->middleware('permission:user_management|view_share_record_user_management')->only(['index']);

        $this->shareRecordService = $shareRecordService;
    }

    public function index(Request $request)
    {
        $data = $this->shareRecordService->showData($request);
        return Inertia::render('ShareRecord', [
            'share' => $data['share'],
            'user_details' => $data['user_details'],
        ]);
    }
}
