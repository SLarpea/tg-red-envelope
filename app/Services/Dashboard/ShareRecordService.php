<?php

namespace App\Services\Dashboard;

use App\Models\ShareRecord;
use App\Models\UserManagement;

class ShareRecordService
{
    public function showData($request)
    {
        return [
            'share' => ShareRecord::orderBy('id', 'asc')->where('tg_id', $request->tg_id)->paginate(15)->withQueryString(),
            'user_details' => UserManagement::where('tg_id', $request->tg_id)->select('username', 'first_name', 'tg_id')->first(),
        ];
    }

}
