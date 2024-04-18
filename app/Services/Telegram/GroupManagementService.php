<?php

namespace App\Services\Telegram;

use App\Models\User;
use App\Models\Config;
use SergiX44\Nutgram\Nutgram;
use App\Models\GroupManagement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use SergiX44\Nutgram\Telegram\Attributes\ParseMode;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;

class GroupManagementService
{

    public function __construct()
    {
    }

    public static function groupInfo($bot)
    {
        $params = [
            'parse_mode' => ParseMode::HTML
        ];
        $bot->sendMessage(trans('telegram.group_id') . "：<code>{$bot->chat()->id}</code>\n" . trans('telegram.user_id') . "：<code>{$bot->user()->id}</code>", $params);
    }

    public static function setLanguage(Nutgram $bot)
    {
        $InlineKeyboardMarkup = InlineKeyboardMarkup::make()->addRow(
            InlineKeyboardButton::make('🇺🇸 EN', callback_data: "update_language-en"),
            InlineKeyboardButton::make('🇨🇳 ZH_CN', callback_data: 'update_language-zh_CN'),
        );

        $data = [
            'parse_mode' => ParseMode::HTML,
            'reply_markup' => $InlineKeyboardMarkup,
            'chat_id' => $bot->chat()->id
        ];

        $bot->sendMessage(trans('telegram.please_choose_a_language_to_set'), $data);
    }

    public static function updateLanguage(Nutgram $bot, $language)
    {
        Session::put('tg_language', $language);

        $groupId = $bot->chat()->id;
        $messageId = $bot->messageId();

        $updateConfig = Config::where('group_id', $groupId)
            ->where('name', 'language')
            ->update(['value' => $language]);

        if ($updateConfig) {
            $message = trans('telegram.language_set_success', ['language' => strtoupper($language)]);

            $bot->answerCallbackQuery([
                'text' => $message,
                'parse_mode' => ParseMode::HTML,
                'show_alert' => true,
                'cache_time' => 5
            ]);

            if ($messageId) {
                $result = $bot->deleteMessage($groupId, $messageId);
            }
        }
    }

    public static function groupRegister(Nutgram $bot)
    {

        $userId = $bot->user()->id;
        $groupId = $bot->chat()->id;
        $groupName = $bot->chat()->title ;

        DB::beginTransaction();

        $userCount = User::where('tg_id', $userId)->count();

        if($userCount > 0){

            $groupCount = GroupManagement::where('group_id', $groupId)->count();
            if($groupCount > 0){
                $data = [
                    'parse_mode' => ParseMode::HTML,
                    'chat_id' => $groupId
                ];

                $bot->sendMessage(trans('telegram.group_already_created'), $data);
            }else{
                try {
                    GroupManagement::create([
                        'group_id' => $groupId,
                        'name' => $groupName,
                        'remark' => "",
                        'status' => 1,
                        'service_url' => "https://www.esplanade.com/",
                        'recharge_url' => "https://www.esplanade.com/",
                        'channel_url' => "https://www.esplanade.com/",
                        'photo_id' => "https://www.esplanade.com/-/media/Offstage-Microsite/Explore-The-Arts/Legends-of-the-hong-baos/legendsofthehongbao-KV-1200x1200.ashx?rev=c640910d27e847d382a3ee095979f616&hash=EA336408CCAC0902CB39D3052BE8E1B2",
                        'admin_id' => $userId,
                    ]);

                    $tgbotConfig = config('tgbot');
                    foreach ($tgbotConfig as $key => $val) {
                        if (Config::query()->where('name', $key)->where('group_id', $groupId)->count() == 0) {
                            $insert = [
                                'name' => $key,
                                'value' => $val,
                                'group_id' => $groupId,
                                'admin_id' => $userId,
                                'remark' => trans('admin.tgbot.' . $key),
                            ];
                            Config::create($insert);
                        }
                    }

                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                }
            }

        }else{
            $data = [
                'parse_mode' => ParseMode::HTML,
                'chat_id' => $groupId
            ];

            $bot->sendMessage(trans('telegram.create_cms_account'), $data);
        }

    }


}
