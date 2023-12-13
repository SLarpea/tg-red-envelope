<?php

namespace App\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use SergiX44\Nutgram\Nutgram;
use App\Services\TelegramService;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class MsgToTelegramJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $backoff = 60;
    public $tries = 1;
    public $timeout = 60;
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
        Log::info('MsgToTelegramJob=>' . json_encode($this->data, JSON_UNESCAPED_UNICODE));
        $rs = TelegramService::qiangAction($bot, $this->data['lucky_id'], $this->data['user_id'], $this->data['message_id'], $this->data['callback_query_id']);
    }
    public function failed(Exception $exception)
    {
        Log::Error('MsgToTelegramJob=failed=>' . $exception);
        // 发送失败通知, etc...
    }
}
