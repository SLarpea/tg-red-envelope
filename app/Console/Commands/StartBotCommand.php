<?php

namespace App\Console\Commands;

use Ramsey\Uuid\Type\Time;
use SergiX44\Nutgram\Nutgram;
use App\Events\PusherBroadcast;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use SergiX44\Nutgram\RunningMode\Polling;
use App\Services\Telegram\TelegramService;
use App\Services\Dashboard\NotificationService;

class StartBotCommand extends Command
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
        } catch (\Exception $e) {
            // Handle exceptions and log errors
            Log::error('Exception: ' . $e);
            $this->sendTelegramMessage($bot, '工作遇到了一个例外。');
        } finally {
            $this->sendTelegramMessage($bot, '电报红色信封已经停止。 - ' . date("Y-m-d H:i:s"));
        }
    }

    protected function sendTelegramMessage(Nutgram $bot, $message)
    {
        try {
            // Store the notification
            $notificationService = app(NotificationService::class);
            $notificationService->store(['message' => $message]);

            // Broadcast the notification to Pusher
            $unreadNotifCount = $notificationService->getUnreadNotif(false);
            broadcast(new PusherBroadcast('telegram', ['message' => $message, 'notif_count' => $unreadNotifCount]))->toOthers();

            // Send a Telegram message
            $telegramBot = app('nutgram.bot');
            $telegramBot->sendMessage($message, ['chat_id' => config('nutgram.tg_bot_error_gc')]);
        } catch (\Exception $e) {
            // Handle exceptions related to sending Telegram messages
            Log::error('Telegram Message Exception: ' . $e);
        }
    }
}
