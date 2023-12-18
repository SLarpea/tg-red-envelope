<?php

namespace App\Telegram\Handlers;

use App\Services\Telegram\TelegramService;
use SergiX44\Nutgram\Nutgram;

class RechargeHandler
{
    protected $telegramServices;

    public function __construct(TelegramService $telegramServices)
    {
        $this->telegramServices = $telegramServices;
    }

    public function handleRecharge(Nutgram $bot, $ac, $amount)
    {
        // The user is the admin, proceed with the recharge
        $this->telegramServices->shangfen($bot, $amount);
    }

    public function handleWithdraw(Nutgram $bot, $ac, $amount)
    {
        $this->telegramServices->xiafen($bot, $amount);
    }

    // Add other recharge-related handlers as needed
}
