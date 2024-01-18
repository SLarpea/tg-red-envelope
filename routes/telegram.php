<?php

/** @var SergiX44\Nutgram\Nutgram $bot */

use App\Models\InviteLink;
use SergiX44\Nutgram\Nutgram;
use App\Jobs\MsgToTelegramJob;
use Illuminate\Support\Facades\Log;
use App\Telegram\Handlers\UserHandler;
use App\Telegram\Middleware\OnlyAdmin;
use App\Services\Telegram\ConfigService;
use App\Telegram\Handlers\InviteHandler;

use App\Telegram\Handlers\ReportHandler;
use App\Telegram\Middleware\GroupVerify;
use App\Telegram\Handlers\RechargeHandler;
use App\Telegram\Handlers\LuckyMoneyHandler;
use App\Telegram\Handlers\DataAnalyticsHandler;
use App\Services\Telegram\UserManagementService;
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
    // Group-level middleware for group verification

    $bot->group(OnlyAdmin::class, function (Nutgram $bot) {
        //     // Group-level middleware for admin-only commands

        //     // Handle recharge and withdraw commands
        //     $bot->onText('(' . trans('telegram.recharge') . '|\+)([0-9]+)', [RechargeHandler::class, 'handleRecharge']);
        //     $bot->onText('(' . trans('telegram.withdraw') . '|-)([0-9]+)', [RechargeHandler::class, 'handleWithdraw']);
        $bot->onCommand('commands(.*)', function (Nutgram $bot) {
            // Handle help command
            $bot->sendMessage(trans('telegram.commands'), [
                'parse_mode' => ParseMode::HTML
            ]);
        });
    });

    // Handle fabao and fuli commands
    $bot->onText('(发[包]*)*([0-9]+\.?[0-9]?)[-/]([0-9]+\.?[0-9]?)', [LuckyMoneyHandler::class, 'handleFabao']);
    $bot->onText(trans('telegram.welfare') . '([0-9]+\.?[0-9]?)[-/]([0-9]+\.?[0-9]?)', [LuckyMoneyHandler::class, 'handleFuli']);

    // Handle balance-related commands
    $bot->onText('(1$|查$|余额$|balance$|ye$|query$)', [UserHandler::class, 'handleCha']);
    $bot->onCallbackQueryData('balance', [UserHandler::class, 'handleUserBalance']);

    // Handle invite link, qiang action, and data analytics commands
    $bot->onCallbackQueryData('invitelink', [InviteHandler::class, 'handleInviteLink']);
    $bot->onCallbackQueryData('qiang-{luckyid}', [LuckyMoneyHandler::class, 'handleQiangAction']);
    $bot->onCallbackQueryData('today_data', [DataAnalyticsHandler::class, 'handleTodayData']);
    $bot->onCallbackQueryData('team_report', [ReportHandler::class, 'handleTeamReport']);
    $bot->onCallbackQueryData('yesterday_data', [DataAnalyticsHandler::class, 'handleYesterdayData']);
    $bot->onCallbackQueryData('share_data', [DataAnalyticsHandler::class, 'handleShareData']);

    // Handle new user joining the chat
    $bot->onChatMember([UserHandler::class, 'handleNewUser']);

    // Handle user registration command
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

    $bot->onText('(groupinfo$)', function (Nutgram $bot, $ac) {
        if ($bot->chat()->type == 'private') {
        } else {
            if ($ac == trans('telegram.groupinfo')) {
                $params = [
                    'parse_mode' => ParseMode::HTML
                ];
                $bot->sendMessage(trans('telegram.group_id') . "：<code>{$bot->chat()->id}</code>\n" . trans('telegram.user_id') . "：<code>{$bot->user()->id}</code>", $params);
            }
        }
    });

    $bot->onCommand('start', function (Nutgram $bot) {
        // Handle start command
        $text = trans('telegram.start_msg', ['userId' => $bot->user()->id]);
        $bot->sendMessage($text);
    });
});

$bot->onText('(groupinfo$)', function (Nutgram $bot, $ac) {
    if ($bot->chat()->type == 'private') {
    } else {
        if ($ac == trans('telegram.groupinfo')) {
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
        // Extract file ID from the second photo in the array
        $fileId = $bot->message()->photo[1]->file_id;

        // Send photo ID in HTML parse mode
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

// Uncomment the following block if you want to handle the 'invite' command
$bot->onCommand('invite(.*)', [InviteHandler::class, 'handleInviteLink']);
