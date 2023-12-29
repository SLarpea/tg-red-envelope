<?php

namespace App\Services\Dashboard;

use App\Models\LuckyHistory;
use App\Models\UserManagement;

class LuckyHistoryService
{
    public function showData($request)
    {
        return [
            'lucky' => LuckyHistory::orderBy('id', 'asc')->where('user_id', $request->tg_id)->paginate(15)->withQueryString(),
            'user_details' => UserManagement::where('tg_id', $request->tg_id)->select('username', 'first_name', 'tg_id')->first(),
        ];
    }

}
