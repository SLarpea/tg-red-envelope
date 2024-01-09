<?php

namespace App\Services\Dashboard;

use App\Models\InviteRecord;
use App\Models\UserManagement;

class InvitationRecordService
{
    public function showData($request)
    {
        return [
            'invites' => InviteRecord::orderBy('id', 'asc')->where('invite_user_id', $request->tg_id)->paginate(15)->withQueryString(),
            'user_details' => UserManagement::where('tg_id', $request->tg_id)->select('username', 'first_name', 'tg_id')->first(),
        ];
    }

}
