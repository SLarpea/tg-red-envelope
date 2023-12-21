<?php

namespace App\Services\Dashboard;

use App\Models\LuckyMoney;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class RedEnvelopeManagementServices
{
    public function showData($request)
    {
        return [
            'envelopes' => LuckyMoney::when($request->term, function ($query, $term) {
                $query->where('chat_id', 'LIKE', '%' . $term . '%');
            })->orderBy('id', 'asc')->paginate($request->show)->withQueryString(),
            'filters' => $request->only(['term', 'show']),
            'response' => Session::get('response'),
        ];
    }
}
