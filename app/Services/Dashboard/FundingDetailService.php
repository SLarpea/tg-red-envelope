<?php

namespace App\Services\Dashboard;

use App\Models\MoneyLog;
use App\Models\UserManagement;

class FundingDetailService
{
    public function showData($request)
    {
        return [
            'funding' => MoneyLog::join('user_management', 'money_logs.tg_id', '=', 'user_management.tg_id')
            ->select('user_management.username', 'user_management.first_name', 'money_logs.*')
            ->where('money_logs.tg_id', $request->tg_id)->paginate(15)->withQueryString(),
        ];
    }

}
