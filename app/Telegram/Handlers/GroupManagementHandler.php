<?php

namespace App\Telegram\Handlers;

use SergiX44\Nutgram\Nutgram;
use App\Services\Telegram\TelegramService;
use App\Services\Telegram\UserManagementService;
use App\Services\Telegram\GroupManagementService;
use SergiX44\Nutgram\Telegram\Attributes\ParseMode;

class GroupManagementHandler
{
    protected $groupManagementService;

    public function __construct(GroupManagementService $groupManagementService)
    {
        $this->groupManagementService = $groupManagementService;
    }

    public function handleGroupInfo(Nutgram $bot)
    {
        $this->groupManagementService->groupInfo($bot);
    }

    public function handleSetlanguage(Nutgram $bot, $ac)
    {
        $this->groupManagementService->setLanguage($bot, $ac);
    }

    public function handleUpdateLanguage(Nutgram $bot, $language)
    {
        $this->groupManagementService->updateLanguage($bot, $language);
    }

    public function groupRegister(Nutgram $bot, $language)
    {
        $this->groupManagementService->groupRegister($bot);
    }

}
