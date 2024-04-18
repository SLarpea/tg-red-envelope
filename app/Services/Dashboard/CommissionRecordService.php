<?php

namespace App\Services\Dashboard;

use App\Models\GroupManagement;
use App\Models\CommissionRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class CommissionRecordService
{
    public function showData($request)
    {
        $adminId = Auth::id();
        $groupIds = GroupManagement::where('admin_id', $adminId)->pluck('group_id');
        return [
            'commissions' => CommissionRecord::with(['user', 'sender'])
            ->whereHas('sender', function ($query) use ($groupIds) {
                $query->whereIn('group_id', $groupIds);
            })
            ->when($request->term, function ($query, $term) use ($groupIds) {
                $query->where(function ($query) use ($term, $groupIds) {
                    $query->where('group_id', 'LIKE', '%' . $term . '%')
                        ->orWhere('tg_id', 'LIKE', '%' . $term . '%')
                        ->orWhere('sender_id', 'LIKE', '%' . $term . '%')
                        ->orWhere('remark', 'LIKE', '%' . $term . '%')
                        ->whereIn('group_id', $groupIds);
                });
            })
            ->orderBy('id', 'asc')
            ->paginate($request->show)
            ->withQueryString(),
            'filters' => $request->only(['term', 'show']),
            'response' => Session::get('response'),
        ];
    }
}
