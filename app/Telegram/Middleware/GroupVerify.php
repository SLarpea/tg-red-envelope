<?php

namespace App\Telegram\Middleware;

use App\Models\GroupManagement;
use Illuminate\Support\Facades\Log;
use SergiX44\Nutgram\Nutgram;

class GroupVerify
{

    public function __invoke(Nutgram $bot, $next): void
    {
        if ($bot->chat()->type === 'private') {
            // Handle private chat logic here if needed
        } else {
            $groupId = $bot->chat()->id;

            $authorizedCount = GroupManagement::query()
                ->where('status', 1)
                ->where('group_id', $groupId)
                ->count();

            if ($authorizedCount > 0) {
                $next($bot);
            } else {
                try {
                    $bot->sendMessage('未授权');
                } catch (\Exception $e) {
                    Log::error('GroupVerify错误' . $e);
                }
            }
        }
    }
}
