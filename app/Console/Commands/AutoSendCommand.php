<?php

namespace App\Console\Commands;


use App\Models\TgUser;
use App\Models\LuckyMoney;
use App\Jobs\MsgToTelegram;
use SergiX44\Nutgram\Nutgram;
use App\Models\UserManagement;
use App\Services\ConfigService;
use App\Services\TgUserService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Services\LuckyMoneyService;
use Illuminate\Support\Facades\Log;
use App\Telegram\Middleware\GroupVerify;
use SergiX44\Nutgram\RunningMode\Polling;
use App\Services\Telegram\TelegramService;
use SergiX44\Nutgram\Telegram\Attributes\ParseMode;
use SergiX44\Nutgram\Telegram\Attributes\MessageTypes;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;

class AutoSendCommand extends Command
{
    protected $signature = 'tg:autosend {groupid}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $telegram;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Nutgram $bot)
    {
        $this->info('开始...');
        $groupid = $this->argument('groupid');

        if (($groupid < 0) === false) {
            $groupid = $groupid * -1;
        }

        while (true) {
            $amount = mt_rand(10, 100);
            $mine = mt_rand(1, 9);
            echo $amount . '-' . $mine . "\n";
            $user = UserManagement::query()->where('balance', '>', 100)->where('group_id', $groupid)->orderBy(DB::raw('rand()'))->first();

            if (!$user) {
                Log::error('群里未发现用户，请先添加用户再操作');
                $this->info('群里未发现用户，请先添加用户再操作');
                break;
            }
            TelegramService::fabao($bot, '', $amount, $mine, $groupid, $user['tg_id']);

            sleep(mt_rand(60, 100));
        }
    }
}
