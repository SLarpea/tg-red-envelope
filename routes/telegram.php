<?php

/** @var SergiX44\Nutgram\Nutgram $bot */

use App\Models\InviteLink;
use SergiX44\Nutgram\Nutgram;
use App\Jobs\MsgToTelegramJob;
use App\Services\ConfigService;
use Illuminate\Support\Facades\Log;
use App\Telegram\Middleware\OnlyAdmin;
use App\Services\UserManagementService;
use App\Telegram\Handlers\InviteHandler;
use App\Telegram\Middleware\GroupVerify;
use App\Telegram\Handlers\RechargeHandler;
use App\Telegram\Handlers\LuckyMoneyHandler;
use App\Telegram\Handlers\UserBalanceHandler;
use App\Telegram\Handlers\DataAnalyticsHandler;
use SergiX44\Nutgram\Telegram\Attributes\ParseMode;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;

/*
|--------------------------------------------------------------------------
| Nutgram Handlers
|--------------------------------------------------------------------------
|
| Register telegram handlers for Nutgram here. These
| handlers are loaded by the NutgramServiceProvider.
|
*/

$bot->group(GroupVerify::class, function (Nutgram $bot) {

    $bot->group(OnlyAdmin::class, function (Nutgram $bot) {
        $bot->onText('(' . trans('telegram.recharge') . '|\+)([0-9]+)', [RechargeHandler::class, 'handleRecharge']);
        $bot->onText('(' . trans('telegram.withdraw') . '|-)([0-9]+)', [RechargeHandler::class, 'handleWithdraw']);

        $bot->onText('(发[包]*)*([0-9]+\.?[0-9]?)[-/]([0-9]+\.?[0-9]?)', [LuckyMoneyHandler::class, 'handleFabao']);
        $bot->onText(trans('telegram.welfare') . '([0-9]+\.?[0-9]?)[-/]([0-9]+\.?[0-9]?)', [LuckyMoneyHandler::class, 'handleFuli']);
    });

    $bot->onText('(1$|查$|余额$|balance$|ye$|query$)', [UserBalanceHandler::class, 'handleCha']);

    $bot->onCallbackQueryData('balance', [UserBalanceHandler::class, 'handleUserBalance']);


    // $bot->onCommand('test-option-for-balance', function (Nutgram $bot) {
    //     $bot->sendMessage('Choose an option:', [
    //         'reply_markup' => InlineKeyboardMarkup::make()->addRow(
    //             InlineKeyboardButton::make('One', callback_data: 'balance'),
    //             InlineKeyboardButton::make('Two', callback_data: 'balance'),
    //             InlineKeyboardButton::make('Cancel', callback_data: 'balance'),
    //         )
    //     ]);
    // });

    $bot->onCallbackQueryData('invitelink', [InviteHandler::class, 'handleInviteLink']);
    $bot->onCallbackQueryData('qiang-{luckyid}', [LuckyMoneyHandler::class, 'handleQiangAction']);

    $bot->onCallbackQueryData('today_data', [DataAnalyticsHandler::class, 'handleTodayData']);

    //             $bot->onCallbackQueryData('team_report', function (Nutgram $bot) {
    //                 $result = UserManagementService::getTeamData($bot->user()->id, $bot->chat()->id);
    //                 if ($result['state'] == 0) {
    //                     $bot->answerCallbackQuery([
    //                         'text' => $result['msg'],
    //                         'show_alert' => true,
    //                         'cache_time' => 10
    //                     ]);
    //                     return false;
    //                 }
    //                 $data = $result['data'];
    //                 $text = trans('telegram.todayprofit') . "：{$data['todayProfit']}
    // " . trans('telegram.todayrecharge') . "：{$data['todayRecharge']}
    // " . trans('telegram.todaywithdraw') . "：{$data['todayWithdraw']}
    // " . trans('telegram.todaysendamount') . "：{$data['todaySendAmount']}";

    //                 $bot->answerCallbackQuery([
    //                     'text' => $text,
    //                     'show_alert' => true,
    //                     'cache_time' => 10
    //                 ]);
    //             });
    //             $bot->onCallbackQueryData('yesterday_data', function (Nutgram $bot) {
    //                 $result = UserManagementService::getYesterdayData($bot->user()->id, $bot->chat()->id);
    //                 if ($result['state'] == 0) {
    //                     $bot->answerCallbackQuery([
    //                         'text' => $result['msg'],
    //                         'show_alert' => true,
    //                         'cache_time' => 10
    //                     ]);
    //                     return false;
    //                 }
    //                 $data = $result['data'];
    //                 $text = trans('telegram.yesterdayprofit') . "：{$data['todayProfit']}
    // -----------
    // " . trans('telegram.expenditure') . "：-{$data['redPayTotal']}
    // " . trans('telegram.awarding') . "：+{$data['sendProfitTotal']}
    // -----------
    // " . trans('telegram.bagincome') . "：+{$data['getProfitTotal']}
    // " . trans('telegram.thunderlose') . "：-{$data['loseTotal']}
    // -----------
    // " . trans('telegram.inviterebate') . "：+{$data['todayInvite']}
    // " . trans('telegram.shareprofit') . "：+{$data['todayShare']}";
    //                 /*
    //                 $text.="
    // -----------
    // 平台抽成：-{$result['todayPlat']}
    // 上级代理抽成：-{$result['todayTopShare']}
    // Jackpot抽成：-{$result['todayJackpot']}";
    //                 */
    //                 $bot->answerCallbackQuery([
    //                     'text' => $text,
    //                     'show_alert' => true,
    //                     'cache_time' => 10
    //                 ]);
    //             });
    //             $bot->onCallbackQueryData('share_data', function (Nutgram $bot) {
    //                 $result = UserManagementService::getShareData($bot->user()->id, $bot->chat()->id);
    //                 $listTxt = '';
    //                 foreach ($result['inviteUserList'] as $val) {
    //                     $listTxt .= ($val['first_name'] != '' ? $val['first_name'] : $val['username']) . "\n";
    //                 }
    //                 $bot->answerCallbackQuery([
    //                     'text' => trans('telegram.todayinvite') . "：" . $result['todayCount'] . "
    // " . trans('telegram.monthinvite') . "：" . $result['monthCount'] . "
    // " . trans('telegram.totalinvite') . "：" . $result['totalCount'] . "
    // -----------
    // " . trans('telegram.lastteninvitations') . "
    // -----------
    // " . $listTxt,
    //                     'show_alert' => true,
    //                     'cache_time' => 30
    //                 ]);
    //             });
    //             $bot->onChatMember(function (Nutgram $bot) {
    //                 self::new_user($bot);
    //                 return true;
    //             });
    /*$bot->onNewChatMembers(function (Nutgram $bot) {
        Log::info('onNewChatMembers==update：'.json_encode($bot->update()));
        $groupId = $bot->chat()->id;
        if(!$bot->message()){
            return false;
        }
        $Member = $bot->message()->new_chat_members[0];
        if($Member){
            $inviteTgId = !$bot->message()->from->is_bot ? $bot->message()->from->id : 0;
            $rs = UserManagementService::addUser($Member,$groupId,$inviteTgId);
            if($rs['state'] == 1 ){
                //欢迎语
                $welcomeText = ConfigService::getConfigValue($groupId, 'welcome');
                if($welcomeText){
                    $bot->sendMessage($welcomeText, ['parse_mode' => ParseMode::HTML]);
                }
            }
        }
    });*/



    //            $bot->onLeftChatMember(function (Nutgram $bot) {
    //                $groupId = $bot->chat()->id;
    //                $Member = $bot->message()->left_chat_member;
    //                $Member->group_id = $groupId;
    //                UserManagementService::leftUser($Member);
    //            });


    $bot->onCommand('register(.*)', function (Nutgram $bot) {
        $groupId = $bot->chat()->id;
        $Member = $bot->user();
        $rs = UserManagementService::registerUser($Member, $groupId);

        try {
            if ($rs['state'] == 1) {
                $bot->sendMessage(trans('telegram.registersuccess'));
            } else {
                $bot->sendMessage($rs['msg']);
            }
        } catch (\Exception $e) {
            Log::error('register异常' . $e);
        }
    });
    // Called on command "/help"
});

$bot->onText('(' . trans('telegram.groupinfo') . ')', function (Nutgram $bot, $ac) {
    // Handle groupinfo command
    if ($bot->chat()->type == 'private') {
        $bot->sendMessage($bot->chat()->type);
        // Do nothing in private chats
    } else {
        if ($ac == trans('telegram.groupinfo')) {
            // Send group and user IDs in the specified format
            $params = [
                'parse_mode' => ParseMode::HTML
            ];
            $bot->sendMessage(trans('telegram.group_id') . "：<code>{$bot->chat()->id}</code>\n" . trans('telegram.user_id') . "：<code>{$bot->user()->id}</code>", $params);
        }
    }
});

$bot->onPhoto(function (Nutgram $bot) {
    // Handle photo messages in private chats
    if ($bot->chat()->type == 'private') {
        $fileId = $bot->message()->photo[1]->file_id;
        // Send photo ID in the specified format
        $params = [
            'parse_mode' => ParseMode::HTML
        ];
        $bot->sendMessage(trans('telegram.photo') . " ID：<code>$fileId</code>", $params);
    }
});

$bot->onCommand('help(.*)', function (Nutgram $bot) {
    // Handle help command
    $helpText = ConfigService::getConfigValue($bot->chat()->id, 'help');
    if ($helpText) {
        // Send help text with HTML parse mode
        $params = [
            'parse_mode' => ParseMode::HTML
        ];
        // Optionally reply to the original message
        if (!empty($bot->message()->message_id)) {
            $params['reply_to_message_id'] = $bot->message()->message_id;
        }
        // Send help text or catch exception and send it again
        try {
            $bot->sendMessage($helpText, $params);
        } catch (\Exception $e) {
            $bot->sendMessage($helpText, ['parse_mode' => ParseMode::HTML]);
        }
    }
});

// $bot->onCommand('invite(.*)', function (Nutgram $bot) {
//     // Handle invite command
//     \App\Services\TelegramService::invite_link($bot);
// });

$bot->onCommand('start', function (Nutgram $bot) {
    // Handle start command
    $text = trans('telegram.start_msg', ['userId' => $bot->user()->id]);
    $bot->sendMessage($text);
});
