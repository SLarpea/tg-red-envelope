<?php

namespace App\Services\Dashboard;

use SergiX44\Nutgram\Nutgram;
use App\Models\RechargeRecord;
use App\Models\UserManagement;
use App\Models\WithdrawRecord;
use App\Models\GroupManagement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use App\Services\Dashboard\BotService;
use Illuminate\Support\Facades\Session;

class UserManagementService
{
    private $botService;

    public function __construct(BotService $botService)
    {
        $this->botService = $botService;
    }

    public function showData($request)
    {
        $adminId = Auth::id();
        $groupIds = GroupManagement::where('admin_id', $adminId)->pluck('group_id');
        return [
            'tgusers' => UserManagement::when($request->term, function ($query, $term) {
                $query->where('username', 'LIKE', '%' . $term . '%')
                      ->orWhere('first_name', 'LIKE', '%' . $term . '%')
                      ->orWhere('group_id', 'LIKE', '%' . $term . '%')
                      ->orWhere('tg_id', 'LIKE', '%' . $term . '%');
            })->whereIn('group_id', $groupIds)->orderBy('id', 'asc')->paginate($request->show)->withQueryString(),
            'filters' => $request->only(['term', 'show']),
            'response' => Session::get('response'),
        ];
    }

    public function updateData($request)
    {
        if ($request->update_type == 'update') {
            UserManagement::find($request->input('id'))->update([
                'first_name' => $request->first_name,
                'status' => $request->status,
                'invite_user' => $request->invite_user,
                'status' => $request->status,
                'type' => $request->type,
                'has_thunder' => $request->has_thunder,
                'no_thunder' => $request->no_thunder,
                'pass_mine' => $request->pass_mine,
                'get_mine' => $request->get_mine,
                'auto_get' => $request->auto_get,
                'send_chance' => $request->send_chance,
            ]);
        } else {
            UserManagement::find($request->input('id'))->update([
                'status' => ($request->status == 1) ? 0 : 1,
            ]);
        }
    }

    public function recharge($request)
    {
        $bot = $this->botService->getBot();

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
                $message = '[ ' . ($request->username ?? $request->first_name) . ' ] 充值 ' . $request->amount . ' U';
                $chatId = $request->group_id;
                // Now, use the $bot instance to send a message
                $bot->sendMessage($message, ['chat_id' => $chatId]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("recharge error=> " . $e->getCode() . '  msg=>' . $e->getMessage() . ' line=>' . $e->getLine());
        }
    }

    public function withdraw($request)
    {
        $bot = $this->botService->getBot();
        DB::beginTransaction();
        try {
            UserManagement::find($request->input('id'))->update([
                'balance' => UserManagement::find($request->input('id'))->balance - $request->amount,
            ]);

            WithdrawRecord::create([
                'tg_id' => $request->tg_id,
                'username' => $request->username,
                'first_name' => $request->first_name,
                'amount' => $request->amount,
                'status' => $request->status,
                'address' => $request->address,
                'addr_type' => $request->addr_type,
                'admin_id' => $request->admin_id,
                'group_id' => $request->group_id,
                'remark' => $request->remark,
            ]);

            DB::commit();
            if ($request->is_send == 1) {
                $message = '[ ' . ($request->username ?? $request->first_name) . ' ] 提取 ' . $request->amount . ' U';
                $chatId = $request->group_id;
                // Now, use the $bot instance to send a message
                $bot->sendMessage($message, ['chat_id' => $chatId]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("recharge error=> " . $e->getCode() . '  msg=>' . $e->getMessage() . ' line=>' . $e->getLine());
        }
    }
}
