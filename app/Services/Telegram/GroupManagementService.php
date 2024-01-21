<?php

namespace App\Services\Telegram;

use App\Models\Config;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Attributes\ParseMode;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;

class GroupManagementService
{

    public function __construct()
    {
    }

    public static function groupInfo($bot, $ac)
    {
        if ($bot->chat()->type == 'private') {
        } else {
            if ($ac == trans('telegram.groupinfo')) {
                $params = [
                    'parse_mode' => ParseMode::HTML
                ];
                $bot->sendMessage(trans('telegram.group_id') . "：<code>{$bot->chat()->id}</code>\n" . trans('telegram.user_id') . "：<code>{$bot->user()->id}</code>", $params);
            }
        }
    }

    public static function setLanguage(Nutgram $bot)
    {
        $InlineKeyboardMarkup = InlineKeyboardMarkup::make()->addRow(
            InlineKeyboardButton::make('EN', callback_data: "update_language-en"),
            InlineKeyboardButton::make('ZH_CN', callback_data: 'update_language-zh_CN'),
        );

        $data = [
            'parse_mode' => ParseMode::HTML,
            'reply_markup' => $InlineKeyboardMarkup,
            'chat_id' => $bot->chat()->id
        ];

        $bot->sendMessage(trans('telegram.please_choose_a_language_to_set'), $data);
    }

    public static function updateLanguage(Nutgram $bot, $language)
    {
        Session::put('tg_language', $language);

        $groupId = $bot->chat()->id;
        $messageId = $bot->messageId();

        $updateConfig = Config::where('group_id', $groupId)
            ->where('name', 'language')
            ->update(['value' => $language]);

        if ($updateConfig) {
            $message = trans('telegram.language_set_success', ['language' => strtoupper($language)]);

            $bot->answerCallbackQuery([
                'text' => $message,
                'parse_mode' => ParseMode::HTML,
                'show_alert' => true,
                'cache_time' => 5
            ]);

            if ($messageId) {
                $result = $bot->deleteMessage($groupId, $messageId);
            }
        }
    }
}
