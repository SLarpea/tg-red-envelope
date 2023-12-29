<?php

namespace App\Services\Dashboard;

use App\Models\RewardRecord;
use App\Models\UserManagement;

class WinningRecordService
{
    public function showData($request)
    {
        return [
            'winning' => RewardRecord::orderBy('id', 'asc')->where('tg_id', $request->tg_id)->paginate(15)->withQueryString(),
            'user_details' => UserManagement::where('tg_id', $request->tg_id)->select('username', 'first_name', 'tg_id')->first(),
        ];
    }

}
