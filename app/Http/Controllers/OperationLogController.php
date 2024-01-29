<?php

namespace App\Http\Controllers;

use App\Models\OperationLog;
use Inertia\Inertia;
use Illuminate\Http\Request;

class OperationLogController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:operation_log')->only(['index']);
    }

    public function index(Request $request)
    {
        return Inertia::render('OperationLog', [
            'logs' => OperationLog::when($request->term, function ($query, $term) {
                $query->where('activity_log.description', 'LIKE', '%' . $term . '%');
            })->select('activity_log.*', 'users.email')->join('users', 'activity_log.causer_id', '=', 'users.id')->orderBy('created_at', 'desc')->paginate($request->show)->withQueryString(),
            'filters' => $request->only(['term', 'show']),
        ]);
    }
}
