<?php

namespace App\Telegram\Middleware;

use SergiX44\Nutgram\Nutgram;
use App\Models\GroupManagement;
use Illuminate\Support\Facades\Log;
use App\Services\Telegram\ConfigService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class GroupVerify
{

    public function __invoke(Nutgram $bot, $next): void
    {
        // Check if the chat type is private
        if ($bot->chat()->type === 'private') {
            // Handle private chat logic here if needed
        } else {
            try {
                // Get the group ID
                $groupId = $bot->chat()->id;

                // Check if the group is authorized
                $authorizedCount = GroupManagement::query()
                    ->where('status', 1)
                    ->where('group_id', $groupId)
                    ->count();

                if ($authorizedCount > 0) {
                    // Get the language for the group
                    $language = ConfigService::getConfigValue($groupId, 'language');

                    // Set the locale based on the user's preference or default to the group language
                    $finalLocale = Session::get('tg_language', $language);
                    App::setLocale($finalLocale);

                    // Continue processing
                    $next($bot);
                } else {
                    // Group is not authorized, send a message
                    $bot->sendMessage('未授权');
                }
            } catch (\Exception $e) {
                // Log any errors that occur during the verification process
                Log::error('GroupVerify错误' . $e);
            }
        }
    }
}
