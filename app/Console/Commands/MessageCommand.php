<?php

namespace App\Console\Commands;

use SergiX44\Nutgram\Nutgram;
use Illuminate\Console\Command;
use App\Services\TelegramService;
use Illuminate\Support\Facades\Log;
use SergiX44\Nutgram\RunningMode\Polling;

class MessageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tg:message';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(Nutgram $bot)
    {
        $this->info('开始...');
        try {
            $bot->setRunningMode(Polling::class);
            TelegramService::handleRed($bot);
            $bot->run();
        } catch (\Exception $e) {
            Log::error('异常' . $e);
        }

        // start to listen to updates, until stopped
    }
}
