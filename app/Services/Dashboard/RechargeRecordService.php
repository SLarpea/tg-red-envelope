<?php

namespace App\Services\Dashboard;

use App\Models\RechargeRecord;
use App\Models\GroupManagement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class RechargeRecordService
{
    public function showData($request)
    {
        $adminId = Auth::id();
        $groupIds = GroupManagement::where('admin_id', $adminId)->pluck('group_id');
        return [
            'recharge' => RechargeRecord::when($request->term, function ($query, $term) {
                $query->where(function ($query) use ($term) {
                    $query->where('username', 'LIKE', '%' . $term . '%')
                        ->orWhere('tg_id', 'LIKE', '%' . $term . '%')
                        ->orWhere('group_id', 'LIKE', '%' . $term . '%')
                        ->orWhere('remark', 'LIKE', '%' . $term . '%')
                        ->orWhere('first_name', 'LIKE', '%' . $term . '%');
                });
            })->whereIn('group_id', $groupIds)->orderBy('id', 'asc')->paginate($request->show)->withQueryString(),
            'filters' => $request->only(['term', 'show']),
            'response' => Session::get('response'),
        ];
    }
}
