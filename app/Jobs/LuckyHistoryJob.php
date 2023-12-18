<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use SergiX44\Nutgram\Nutgram;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\Telegram\TelegramService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class LuckyHistoryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Nutgram $bot)
    {
        Log::info('LuckyHistoryJob=>'.json_encode($this->data,JSON_UNESCAPED_UNICODE));
        TelegramService::addHistory($bot, $this->data['luckyid'],$this->data['userId'],$this->data['redAmount'],$this->data['isThunder'],$this->data['loseMoney']);
    }
}
