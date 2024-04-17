<?php

namespace App\Services\Dashboard;

use App\Models\LuckyMoney;
use App\Models\GroupManagement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class RedEnvelopeManagementService
{
    public function showData($request)
    {
        $adminId = Auth::id();
        $groupIds = GroupManagement::where('admin_id', $adminId)->pluck('group_id');
        return [
            'envelopes' => LuckyMoney::with('sender')->whereHas('sender', function ($query) use ($groupIds) {
                $query->whereIn('group_id', $groupIds);
            })->when($request->term, function ($query, $term) {
                $query->where('chat_id', 'LIKE', '%' . $term . '%');
            })->orderBy('id', 'asc')->paginate($request->show)->withQueryString(),
            'filters' => $request->only(['term', 'show']),
            'response' => Session::get('response'),
        ];
    }
}
