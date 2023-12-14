<?php

namespace App\Services;

use App\Models\WithdrawRecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class WithdrawRecordServices
{
    public function showData($request)
    {
        return [
            'withdraw' => WithdrawRecord::when($request->term, function ($query, $term) {
                $query->where('username', 'LIKE', '%' . $term . '%');
            })->orderBy('id', 'asc')->paginate($request->show)->withQueryString(),
            'filters' => $request->only(['term', 'show']),
            'response' => Session::get('response'),
        ];
    }
}
