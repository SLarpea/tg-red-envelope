<?php

namespace App\Telegram\Handlers;

use SergiX44\Nutgram\Nutgram;
use App\Jobs\MsgToTelegramJob;
use App\Services\Telegram\TelegramService;

class LuckyMoneyHandler
{
    protected $telegramServices;

    public function __construct(TelegramService $telegramServices)
    {
        $this->telegramServices = $telegramServices;
    }

    public function handleFabao(Nutgram $bot, $ac, $amount, $mine)
    {
        $this->telegramServices->fabao($bot, $ac, $amount, $mine);
    }

    public function handleFuli(Nutgram $bot, $amount, $num)
    {
        $this->telegramServices->fuli($bot, $amount, $num);
    }

    public function handleQiangAction(Nutgram $bot, $luckyid)
    {
        $userId = $bot->user()->id;
        if (env('QUEUE_CONNECTION') == 'sync') {
            $this->telegramServices->qiangAction($bot, $luckyid, $userId, $bot->message()->message_id, $bot->callbackQuery()?->id);
        } else {
            $jobData = [
                'chat_id' => $bot->chat()->id,
                'lucky_id' => $luckyid,
                'user_id' => $userId,
                'message_id' => $bot->message()->message_id,
                'callback_query_id' => $bot->callbackQuery()?->id,
            ];
            MsgToTelegramJob::dispatch($jobData)->onQueue('qiang');
        }
    }
}
