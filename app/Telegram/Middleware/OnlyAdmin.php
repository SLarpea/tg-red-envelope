<?php

namespace App\Telegram\Middleware;

use Illuminate\Support\Facades\Log;
use SergiX44\Nutgram\Nutgram;

class OnlyAdmin
{
    public function __invoke(Nutgram $bot, $next): void
    {
        if ($bot->chat()->type === 'private') {
            // Handle private chat logic here if needed
        } else {
            // Get chat information
            $chatId = $bot->message()->chat->id;
            $userId = $bot->message()->from->id;

            // Get chat member information
            $chatMember = $bot->getChatMember($chatId, $userId);

            // Check if the user is an administrator or creator
            $isAdmin = $chatMember->status === 'administrator' || $chatMember->status === 'creator';

            if ($isAdmin) {
                // The user is the admin, proceed with the next middleware or handler
                $next($bot);
            } else {
                // The user is not the admin, send a message indicating the lack of permission
                $bot->sendMessage("Sorry, only the admin can make this request.");
            }
        }
    }
}
