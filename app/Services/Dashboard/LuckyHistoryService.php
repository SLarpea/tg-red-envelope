<?php

namespace App\Services\Dashboard;

use App\Models\LuckyHistory;

class LuckyHistoryService
{
    public function showData($request)
    {
        return [
            'lucky' => LuckyHistory::orderBy('id', 'asc')->where('user_id', $request->tg_id)->paginate(15)->withQueryString(),
        ];
    }

}
