<?php

/** @var SergiX44\Nutgram\Nutgram $bot */

use App\Models\InviteLink;
use App\Services\ConfigService;
use Illuminate\Support\Facades\Log;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Attributes\ParseMode;

/*
|--------------------------------------------------------------------------
| Nutgram Handlers
|--------------------------------------------------------------------------
|
| Register telegram handlers for Nutgram here. These
| handlers are loaded by the NutgramServiceProvider.
|
*/

$bot->onText('/(' . trans('telegram.groupinfo') . ')/', function (Nutgram $bot, $ac) {
    // Handle groupinfo command
    if ($bot->chat()->type == 'private') {
        // Do nothing in private chats
    } else {
        if ($ac == trans('telegram.groupinfo')) {
            // Send group and user IDs in the specified format
            $params = [
                'parse_mode' => ParseMode::HTML
            ];
            $bot->sendMessage(trans('telegram.group_id') . "：<code>{$bot->chat()->id}</code>\n" . trans('telegram.user_id') . "：<code>{$bot->user()->id}</code>", $params);
        }
    }
});

$bot->onPhoto(function (Nutgram $bot) {
    // Handle photo messages in private chats
    if ($bot->chat()->type == 'private') {
        $fileId = $bot->message()->photo[1]->file_id;
        // Send photo ID in the specified format
        $params = [
            'parse_mode' => ParseMode::HTML
        ];
        $bot->sendMessage(trans('telegram.photo') . " ID：<code>$fileId</code>", $params);
    }
});

$bot->onCommand('help(.*)', function (Nutgram $bot) {
    // Handle help command
    $helpText = ConfigService::getConfigValue($bot->chat()->id, 'help');
    if ($helpText) {
        // Send help text with HTML parse mode
        $params = [
            'parse_mode' => ParseMode::HTML
        ];
        // Optionally reply to the original message
        if (!empty($bot->message()->message_id)) {
            $params['reply_to_message_id'] = $bot->message()->message_id;
        }
        // Send help text or catch exception and send it again
        try {
            $bot->sendMessage($helpText, $params);
        } catch (\Exception $e) {
            $bot->sendMessage($helpText, ['parse_mode' => ParseMode::HTML]);
        }
    }
});

// $bot->onCommand('invite(.*)', function (Nutgram $bot) {
//     // Handle invite command
//     \App\Services\TelegramService::invite_link($bot);
// });

$bot->onCommand('start', function (Nutgram $bot) {
    // Handle start command
    $text = trans('telegram.start_msg', ['userId' => $bot->user()->id]);
    $bot->sendMessage(trans('telegram.groupinfo') . $locale = app()->getLocale());
});
