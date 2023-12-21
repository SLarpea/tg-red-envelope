<?php

namespace App\Telegram\Handlers;

use App\Services\Telegram\TelegramService;
use SergiX44\Nutgram\Nutgram;

class InviteHandler
{
    protected $telegramServices;

    public function __construct(TelegramService $telegramServices)
    {
        $this->telegramServices = $telegramServices;
    }

    public function handleInviteLink(Nutgram $bot)
    {
        $this->telegramServices->invite_link($bot);
    }
}
