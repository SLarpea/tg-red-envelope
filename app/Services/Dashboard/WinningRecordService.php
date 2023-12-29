<?php

namespace App\Services\Dashboard;

use App\Models\RewardRecord;

class WinningRecordService
{
    public function showData($request)
    {
        return [
            'winning' => RewardRecord::orderBy('id', 'asc')->where('tg_id', $request->tg_id)->paginate(15)->withQueryString(),
        ];
    }

}
