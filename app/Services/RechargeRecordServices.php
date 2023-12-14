<?php

namespace App\Services;

use App\Models\RechargeRecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class RechargeRecordServices
{
    public function showData($request)
    {
        return [
            'recharge' => RechargeRecord::when($request->term, function ($query, $term) {
                $query->where('username', 'LIKE', '%' . $term . '%');
            })->orderBy('id', 'asc')->paginate($request->show)->withQueryString(),
            'filters' => $request->only(['term', 'show']),
            'response' => Session::get('response'),
        ];
    }
}
