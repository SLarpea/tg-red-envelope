<?php

namespace App\Telegram\Handlers;

use App\Services\Telegram\TelegramService;
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

    public function handleYesterdayData(Nutgram $bot)
    {
        $this->telegramServices->yesterData($bot);
    }

    public function handleShareData(Nutgram $bot)
    {
        $this->telegramServices->shareData($bot);
    }
}
