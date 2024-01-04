<?php

namespace App\Services\Dashboard;

use SergiX44\Nutgram\Nutgram;

class BotService
{
    private $bot;

    public function __construct()
    {
        $this->bot = new Nutgram(config('nutgram.token'), [
            'api_url' => env('BASE_BOT_URL'),
            'timeout' => 86400
        ]);
    }

    public function getBot()
    {
        return $this->bot;
    }
}
