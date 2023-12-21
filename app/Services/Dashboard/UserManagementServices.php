<?php

namespace App\Services\Dashboard;

use App\Models\RechargeRecord;
use App\Models\UserManagement;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class UserManagementServices
{
    public function showData($request)
    {
        return [
            'tgusers' => UserManagement::when($request->term, function ($query, $term) {
                $query->where('username', 'LIKE', '%' . $term . '%');
            })->orderBy('id', 'asc')->paginate($request->show)->withQueryString(),
            'filters' => $request->only(['term', 'show']),
            'response' => Session::get('response'),
        ];
    }

    public function recharge($request)
    {
        UserManagement::find($request->input('id'))->update([
            'balance' => $request->amount + UserManagement::find($request->input('id'))->balance,
        ]);

        RechargeRecord::create([
            'tg_id' => $request->tg_id,
            'username' => $request->username,
            'amount' => $request->amount,
            'status' => $request->status,
            'type' => $request->type,
            'first_name' => $request->first_name,
            'admin_id' => $request->admin_id,
            'group_id' => $request->group_id,
            'remark' => $request->remark,
        ]);

    }
}
