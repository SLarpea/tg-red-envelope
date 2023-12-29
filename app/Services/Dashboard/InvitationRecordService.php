<?php

namespace App\Services\Dashboard;

use App\Models\InviteRecord;

class InvitationRecordService
{
    public function showData($request)
    {
        return [
            'invites' => InviteRecord::orderBy('id', 'asc')->where('tg_id', $request->tg_id)->paginate(15)->withQueryString(),
        ];
    }

}
