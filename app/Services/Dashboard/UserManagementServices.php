<?php

namespace App\Services\Dashboard;

use SergiX44\Nutgram\Nutgram;
use App\Models\RechargeRecord;
use App\Models\UserManagement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class UserManagementServices
{
    private $bot;

    public function __construct()
    {
        $this->bot = new Nutgram(config('nutgram.token'), [
            'api_url' => env('BASE_BOT_URL'),
            'timeout' => 86400
        ]);
    }

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
        DB::beginTransaction();
        try {
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

            DB::commit();
            if ($request->is_send == 1) {
                $this->bot->sendMessage('[ ' . ($request->username ?? $request->first_name) . ' ] 充值 ' . $request->amount . ' U', ['chat_id' => $request->group_id]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("recharge error=> " . $e->getCode() . '  msg=>' . $e->getMessage() . ' line=>' . $e->getLine());
        }
    }
}
