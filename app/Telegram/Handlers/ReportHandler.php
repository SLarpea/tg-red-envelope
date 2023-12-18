<?php

namespace App\Telegram\Handlers;

use App\Services\TelegramService;
use App\Services\UserManagementService;
use SergiX44\Nutgram\Nutgram;

class ReportHandler
{
    protected $telegramServices;
    protected $userManagementService;

    public function __construct(TelegramService $telegramServices, UserManagementService $userManagementService)
    {
        $this->telegramServices = $telegramServices;
        $this->userManagementService = $userManagementService;
    }

    public function handleTeamReport(Nutgram $bot)
    {
        $this->telegramServices->teamReport($bot);
    }
}
