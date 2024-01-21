<?php

namespace App\Telegram\Handlers;

use SergiX44\Nutgram\Nutgram;
use App\Services\Telegram\TelegramService;
use App\Services\Telegram\UserManagementService;
use SergiX44\Nutgram\Telegram\Attributes\ParseMode;

class UserHandler
{
    protected $telegramServices;

    protected $userManagementService;

    public function __construct(TelegramService $telegramServices, UserManagementService $userManagementService)
    {
        $this->telegramServices = $telegramServices;
        $this->userManagementService = $userManagementService;
    }

    public function handleCha(Nutgram $bot, $ac)
    {
        $validActions = ['1', 'ye', 'balance', 'query', '查', '余额', '查余额'];

        if (in_array($ac, $validActions, true)) {
            $this->telegramServices->cha($bot);
        }
    }

    public function handleUserBalance(Nutgram $bot)
    {
        $this->userManagementService->userBalance($bot);
    }

    public function handleNewUser(Nutgram $bot)
    {
        $this->userManagementService->new_user($bot);
        return true;
    }

    public function handleRegister(Nutgram $bot)
    {
        $this->userManagementService->register($bot);
        return true;
    }

    public function handleHelp(Nutgram $bot)
    {
        $this->userManagementService->help($bot);
    }

    public function handleStart(Nutgram $bot)
    {
        $this->userManagementService->start($bot);
    }

    public function handlePhoto(Nutgram $bot)
    {
        $this->userManagementService->photo($bot);
    }

    public function handleCommands(Nutgram $bot)
    {
        $this->userManagementService->commands($bot);
    }
}
