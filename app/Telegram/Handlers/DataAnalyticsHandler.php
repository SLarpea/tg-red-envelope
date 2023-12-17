<?php

namespace App\Telegram\Handlers;

use App\Services\TelegramService;
use SergiX44\Nutgram\Nutgram;

class DataAnalyticsHandler
{
    protected $telegramServices;

    public function __construct(TelegramService $telegramServices)
    {
        $this->telegramServices = $telegramServices;
    }

    public function handleTodayData(Nutgram $bot)
    {
        $this->telegramServices->todayData($bot);
    }
}
