<?php

namespace App\Telegram\Middleware;

use SergiX44\Nutgram\Nutgram;
use App\Models\UserManagement;
use App\Models\GroupManagement;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Services\Telegram\ConfigService;
use App\Services\Telegram\UserManagementService;

class AutoRegister
{

    public function __invoke(Nutgram $bot, $next): void
    {

        $userId = $bot->user()->id;
        $groupId = $bot->chat()->id;

        $userCount = UserManagement::where('tg_id', $userId)
        ->where('group_id', $groupId)
        ->count();
        if($userCount > 0){
            $next($bot);
        }else{
            $Member = $bot->user();
            $rs = UserManagementService::registerUser($Member, $groupId);
                    if ($rs['state'] == 1) {
                    // $bot->sendMessage(trans('telegram.registersuccess'));
                } else {
                    $bot->sendMessage($rs['msg']);
                }
            $next($bot);
        }

    }
}
