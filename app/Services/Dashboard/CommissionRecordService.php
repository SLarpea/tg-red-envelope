<?php

namespace App\Services\Dashboard;

use App\Models\CommissionRecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class CommissionRecordService
{
    public function showData($request)
    {
        return [
            'commissions' => CommissionRecord::with(['user', 'sender'])->when($request->term, function ($query, $term) {
                $query->where('group_id', 'LIKE', '%' . $term . '%');
            })->orderBy('id', 'asc')->paginate($request->show)->withQueryString(),
            'filters' => $request->only(['term', 'show']),
            'response' => Session::get('response'),
        ];
    }
}
