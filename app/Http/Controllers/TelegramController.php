<?php

namespace App\Http\Controllers;

use App\Services\Telegram\TelegramService;
use Illuminate\Support\Facades\Artisan;
use SergiX44\Nutgram\Nutgram;
use Illuminate\Support\Facades\Log;
use SergiX44\Nutgram\RunningMode\Polling;
use SergiX44\Nutgram\RunningMode\Webhook;

class TelegramController extends Controller
{
    /**
     * Handle the request.
     */
    public function __invoke(Nutgram $bot)
    {
        try {
            // $bot->setRunningMode(Webhook::class);
            $bot->run();
        } catch (\Exception $e) {
            Log::error('异常' . $e);
        }
    }

}
