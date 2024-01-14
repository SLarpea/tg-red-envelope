<?php

namespace App\Console\Commands;

use App\Models\GroupManagement;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class GroupGenerateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'groupgenerate {groupid}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $groupid = $this->argument('groupid');

        if (($groupid < 0) === false) {
            $groupid = $groupid * -1;
        }

        $groupmanagement = GroupManagement::updateOrCreate(['group_id' => $groupid], [
            'name' => "RED ENVELOPE TEST",
            'remark' => "RED ENVELOPE REMARK TEST",
            'status' => 1,
            'service_url' => "https://www.esplanade.com/",
            'recharge_url' => "https://www.esplanade.com/",
            'channel_url' => "https://www.esplanade.com/",
            'photo_id' => "https://www.esplanade.com/-/media/Offstage-Microsite/Explore-The-Arts/Legends-of-the-hong-baos/legendsofthehongbao-KV-1200x1200.ashx?rev=c640910d27e847d382a3ee095979f616&hash=EA336408CCAC0902CB39D3052BE8E1B2",
            'admin_id' => 1,
        ]);

        if ($groupmanagement) {
            Artisan::call('gconfig');
            Artisan::call("tgbot:run");
        }
    }
}
