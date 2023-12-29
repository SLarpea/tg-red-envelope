<?php

namespace App\Services\Dashboard;

use App\Models\ShareRecord;

class ShareRecordService
{
    public function showData($request)
    {
        return [
            'share' => ShareRecord::orderBy('id', 'asc')->where('tg_id', $request->tg_id)->paginate(15)->withQueryString(),
        ];
    }

}
