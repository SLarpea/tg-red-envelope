<?php

namespace App\Console\Commands;

use Exception;
use Ramsey\Uuid\Type\Time;
use SergiX44\Nutgram\Nutgram;
use App\Events\PusherBroadcast;
use Illuminate\Console\Command;
use App\Domain\NotificationDomain;
use Illuminate\Support\Facades\Log;
use SergiX44\Nutgram\RunningMode\Polling;
use App\Services\Telegram\TelegramService;
use Illuminate\Database\Eloquent\Collection;
use App\Services\Dashboard\NotificationService;

class StartBotCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tgbot:run';

    protected $isException = false;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize telegram bot';

    public function handle(Nutgram $bot)
    {
        try {
            // Set the running mode and run the bot
            $bot->setRunningMode(Polling::class);
            $bot->run();
        } catch (Exception $e) {
            // An exception occurred
            $this->handleException($bot, $e);
        } finally {
            // Check if an exception occurred during bot execution
            if (!$this->isException) {
                // No exception, notify that the bot has stopped
                $this->sendTelegramMessage($bot, __('telegram.telegtelegram_bot_run_stop'));
            }
            // Reset the exception flag
            $this->isException = false;
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
        } catch (Exception $e) {
            // Handle exceptions related to sending Telegram messages
            Log::error('Telegram Message Exception: ' . $e->getMessage());
        }
    }

    private function handleException(Nutgram $bot, Exception $e)
    {
        $this->isException = true;

        // Log the exception
        Log::error('Exception: ' . $e);

        // Notify about the exception
        $this->sendTelegramMessage($bot, __('telegram.telegram_bot_run_error'));
    }
}
