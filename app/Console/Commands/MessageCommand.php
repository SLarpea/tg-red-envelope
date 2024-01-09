<?php

namespace App\Console\Commands;

use SergiX44\Nutgram\Nutgram;
use Illuminate\Console\Command;
use App\Services\Telegram\TelegramService;
use Illuminate\Support\Facades\Log;
use SergiX44\Nutgram\RunningMode\Polling;

class MessageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tgbot:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize telegram bot';

    public function handle(Nutgram $bot)
    {
        try {
            $bot->setRunningMode(Polling::class);
            $bot->run();
            $retry = false; // No exception occurred, so no need to retry
        } catch (\Exception $e) {
            // Handle exceptions and log errors
            Log::error('Exception: ' . $e);
            $this->sendTelegramMessage($bot, 'Job encountered an exception. Check the logs for details.');
        } finally {
            $this->sendTelegramMessage($bot, 'Telegram red envelope has stopped.');
        }
    }

    protected function sendTelegramMessage(Nutgram $bot, $message)
    {
        try {
            $bot->sendMessage($message, ['chat_id' => config('nutgram.tg_bot_error_gc')]);
        } catch (\Exception $e) {
            // Handle exceptions related to sending Telegram messages
            Log::error('Telegram Message Exception: ' . $e);
        }
    }
}
