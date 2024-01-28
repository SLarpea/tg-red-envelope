<?php

namespace App\Console\Commands;

use Ramsey\Uuid\Type\Time;
use SergiX44\Nutgram\Nutgram;
use App\Events\PusherBroadcast;
use Illuminate\Console\Command;
use App\Domain\NotificationDomain;
use Illuminate\Support\Facades\Log;
use SergiX44\Nutgram\RunningMode\Polling;
use App\Services\Telegram\TelegramService;
use App\Services\Dashboard\NotificationService;
use Illuminate\Database\Eloquent\Collection;

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
            $this->sendTelegramMessage($bot, '电报红色信封已经停止。');
        }
    }

    protected function sendTelegramMessage(Nutgram $bot, $message)
    {
        try {
            // Store the notification
            $notificationService = app(NotificationService::class);
            $notificationData = [
                'type' => __(NotificationDomain::NOTIF_ERROR),
                'title' => __(NotificationDomain::NOTIF_TGBOT_ERROR),
                'message' => $message,
            ];
            $savedData = $notificationService->store($notificationData);

            // Broadcast the notification to Pusher
            $unreadNotifCount = $notificationService->getUnreadNotifications(false);
            $pusherData = array_merge($savedData->toArray(), ['notif_count' => $unreadNotifCount]);
            broadcast(new PusherBroadcast('telegram', $pusherData))->toOthers();

            // Send a Telegram message
            $telegramBot = app('nutgram.bot');
            $telegramBot->sendMessage($message, ['chat_id' => config('nutgram.tg_bot_error_gc')]);
        } catch (\Exception $e) {
            // Handle exceptions related to sending Telegram messages
            Log::error('Telegram Message Exception: ' . $e->getMessage());
        }
    }
}
