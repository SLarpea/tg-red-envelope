<?php

namespace App\Services\Dashboard;

use App\Models\WithdrawRecord;
use App\Models\GroupManagement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class WithdrawRecordService
{
    public function showData($request)
    {
        $adminId = Auth::id();
        $groupIds = GroupManagement::where('admin_id', $adminId)->pluck('group_id');
        return [
            'withdraw' => WithdrawRecord::when($request->term, function ($query, $term) {
                $query->where('username', 'LIKE', '%' . $term . '%');
            })->whereIn('group_id', $groupIds)->orderBy('id', 'asc')->paginate($request->show)->withQueryString(),
            'filters' => $request->only(['term', 'show']),
            'response' => Session::get('response'),
        ];
    }
}
