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
use App\Telegram\Handlers\GroupManagementHandler;
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
        $bot->onCommand('commands(.*)', [UserHandler::class, 'handleCommands']);

        $bot->onCommand('setLanguage(.*)', [GroupManagementHandler::class, 'handleSetlanguage']);

        // update language here
        $bot->onCallbackQueryData('update_language-{language}', [GroupManagementHandler::class, 'handleUpdateLanguage']);
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
    $bot->onCommand('register(.*)', [UserHandler::class, 'handleRegister']);

    $bot->onText('(groupinfo$)', [GroupManagementHandler::class, 'handleGroupInfo']);

    $bot->onCommand('start(.*)', [UserHandler::class, 'handleStart']);
});


$bot->onText('(groupinfo$)', [GroupManagementHandler::class, 'start']);


$bot->onPhoto([UserHandler::class, 'handlePhoto']);

$bot->onCommand('help(.*)', [UserHandler::class, 'handleHelp']);

// Uncomment the following block if you want to handle the 'invite' command
$bot->onCommand('invite(.*)', [InviteHandler::class, 'handleInviteLink']);
