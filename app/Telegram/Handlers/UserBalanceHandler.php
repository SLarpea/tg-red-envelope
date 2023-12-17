<?php

namespace App\Telegram\Handlers;

use SergiX44\Nutgram\Nutgram;
use App\Services\TelegramService;
use App\Services\UserManagementService;
use SergiX44\Nutgram\Telegram\Attributes\ParseMode;

class UserBalanceHandler
{
    protected $telegramServices;

    public function __construct(TelegramService $telegramServices)
    {
        $this->telegramServices = $telegramServices;
    }

    public function handleCha(Nutgram $bot, $ac)
    {
        if ($ac == '1' || $ac == 'ye' || $ac == 'balance' || $ac == 'query' || $ac == '查' || $ac == '余额' || $ac == '查余额') {
            $this->telegramServices->cha($bot);
        }
    }

    public function handleUserBalance(Nutgram $bot)
    {
        $userInfo = UserManagementService::getUserById($bot->user()->id, $bot->chat()->id);
        if (!$userInfo) {
            $bot->answerCallbackQuery([
                'text' => trans('telegram.notregistered'),
                'show_alert' => true,
                'cache_time' => 5
            ]);
        } else {
            $bot->answerCallbackQuery([
                'text' => "{$userInfo->first_name} \n@{$userInfo->username} \n-----------------------------\nID：{$userInfo->tg_id}\n" . trans('telegram.balance') . "：{$userInfo->balance}  U",
                'parse_mode' => ParseMode::HTML,
                'show_alert' => true,
                'cache_time' => 5
            ]);
        }
    }
}
