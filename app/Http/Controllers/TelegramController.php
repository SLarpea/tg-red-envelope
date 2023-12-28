<?php

namespace App\Http\Controllers;
use App\Services\Telegram\TelegramService;
use SergiX44\Nutgram\Nutgram;
use Illuminate\Support\Facades\Log;
use SergiX44\Nutgram\RunningMode\Polling;

class TelegramController extends Controller
{
    /**
     * Handle the request.
     */
    public function __invoke(Nutgram $bot)
    {

//        $bot->setRunningMode(Webhook::class);
        // TelegramService::handleRed($bot);

        // $bot->run();

        $this->info('开始...');
        try {
            $bot->setRunningMode(Polling::class);
            $bot->run();
        } catch (\Exception $e) {
            Log::error('异常' . $e);
        }

         // start to listen to updates, until stopped
    }
}
