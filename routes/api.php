<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\Dashboard\BotService;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/'.env('TELEGRAM_WEBHOOK_KEY').'/webhook', \App\Http\Controllers\TelegramController::class);

Route::get('/get-webhooks', function(){
    $endpoint = env('TELEGRAM_WEBHOOK_KEY').'/webhook';
    $telegramBotToken = env('TELEGRAM_BOT_TOKEN');
    $response = [
        'setwebhook' => "https://api.telegram.org/bot$telegramBotToken/setWebhook?url=https://test-tg-red.feiwin.dev/api$endpoint",
        'deletewebhook' => "https://api.telegram.org/bot$telegramBotToken/deleteWebhook?url=https://test-tg-red.feiwin.dev/api$endpoint"
    ];
    return response()->json($response);

});

Route::post('test-send', function(Request $request, BotService $botS){
    $bot = $botS->getBot();

    //  MESSAGE
    $message = $request->message ?? 'Test message to -4027545771';
    $chatId = $request->chat_id ??  '-4027545771';
    $bot->sendMessage($message, ['chat_id' => $chatId]);
});
