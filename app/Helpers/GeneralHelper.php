<?php

use Carbon\Carbon;
use App\Models\MoneyLog;
use App\Models\AuthGroup;
use Illuminate\Support\Arr;
use App\Models\UserManagement;
use App\Models\GroupManagement;
use App\Logging\LogJsonFormatter;
use Illuminate\Support\Facades\Redis;
use App\Services\Telegram\ConfigService;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;


if (!function_exists('user_admin_config')) {
    function user_admin_config($key = null, $value = null)
    {
        $session = session();

        if (!$config = $session->get('admin.config')) {
            $config = config('admin');

            $config['lang'] = config('app.locale');
        }

        if (is_array($key)) {
            // 保存
            foreach ($key as $k => $v) {
                Arr::set($config, $k, $v);
            }

            $session->put('admin.config', $config);

            return;
        }

        if ($key === null) {
            return $config;
        }

        return Arr::get($config, $key, $value);
    }
}


if (!function_exists('red_envelope')) {
    function red_envelope($totalAmount, $totalCount, $minAmount, $maxAmount, $thunder, $chat_id = 0, $chance = 30): array
    {
        $leftAmount = $totalAmount; // 剩余金额
        $leftCount = $totalCount; // 剩余个数
        $hasThunder = 0;
        if (mt_rand(1, 100) <= $chance) {
            $hasThunder = 1;
        }
        $straight_rate = ConfigService::getConfigValue($chat_id, 'straight_rate');
        $leopard_rate = ConfigService::getConfigValue($chat_id, 'leopard_rate');
        $noStraight = true;
        if (mt_rand(1, 100) <= $straight_rate) {
            $noStraight = false;
        }
        $noLeopard = true;
        if (mt_rand(1, 100) <= $leopard_rate) {
            $noLeopard = false;
        }
        while (true) {
            if ($hasThunder == 0) {
                $result = get_nothunder_list($totalCount, $leftCount, $leftAmount, $maxAmount, $minAmount, $thunder, $noStraight, $noLeopard);
            } else {
                $result = get_thunder_list($leftCount, $leftAmount, $maxAmount, $minAmount, $thunder, $noStraight, $noLeopard);
            }
            if (count(array_unique($result)) == $totalCount) {
                break;
            }
        }

        return $result;
    }
}
if (!function_exists('get_thunder_list')) {
    function get_thunder_list($leftCount, $leftAmount, $maxAmount, $minAmount, $thunder, $noStraight, $noLeopard): array
    {
        $thunderResult = [];
        $thunderCount = 1;
        if (mt_rand(1, 100) <= 30) {
            $thunderCount = 2;
        }
        if (mt_rand(1, 100) <= 10) {
            $thunderCount = 3;
        }
        if (mt_rand(1, 100) <= 5) {
            $thunderCount = 4;
        }

        for ($i = 1; $i <= $thunderCount; $i++) {
            $amount = get_thunder_num($maxAmount, $minAmount, $leftAmount, $leftCount, $thunder);
            if ($noStraight && straight_check($amount)) {
                while (true) {
                    $amount = get_thunder_num($maxAmount, $minAmount, $leftAmount, $leftCount, $thunder);
                    if (!straight_check($amount)) {
                        break;
                    }
                }
            }
            if ($noLeopard && leopard_check($amount)) {
                while (true) {
                    $amount = get_thunder_num($maxAmount, $minAmount, $leftAmount, $leftCount, $thunder);
                    if (!leopard_check($amount)) {
                        break;
                    }
                }
            }
            if ($amount > 0) {
                $thunderResult[] = $amount;
                if ($leftCount > 1) {
                    $leftAmount -= $amount;
                    $leftCount--;
                }
            }
        }
        $noResult = get_nothunder_list($leftCount, $leftCount, $leftAmount, $maxAmount, $minAmount, $thunder, $noStraight, $noLeopard);
        $newResult = array_merge($thunderResult, $noResult);
        shuffle($newResult);
        return $newResult;
    }
}
if (!function_exists('get_thunder_num')) {
    function get_thunder_num($maxAmount, $minAmount, $leftAmount, $leftCount, $thunder)
    {
        $max = min($maxAmount, $leftAmount - ($leftCount - 1) * $minAmount * 2); // 红包最大金额不能超过剩余金额和最大金额的较小值
        $min = max($minAmount, $leftAmount - ($leftCount - 1) * $maxAmount); // 红包最小金额不能低于剩余金额和最小金额的较大值
        if ($max < $min) {
            $tmp = $max;
            $max = $min;
            $min = $tmp;
        }
        $amount = get_random_amount($min, $max, 1);
        $amount = number_format($amount, 1, '.', '') . $thunder;
        return $amount;
    }
}

if (!function_exists('get_nothunder_list')) {
    function get_nothunder_list($totalCount, $leftCount, $leftAmount, $maxAmount, $minAmount, $thunder, $noStraight, $noLeopard): array
    {
        $result = [];
        for ($i = 1; $i <= $totalCount; $i++) {
            if ($leftCount == 1) {
                $amount = number_format($leftAmount, 2, '.', '');
                if (substr($amount, strlen($amount) - 1, 1) == $thunder) {
                    $dec = 1;
                    while (true) {
                        if ($leftAmount <= $dec / 100) {
                            if (count($result) <= 1) {
                                break;
                            }
                            $amount = number_format((float)$leftAmount + $dec / 100, 2, '.', '');
                            $j = 1;

                            while ($result[count($result) - $j] - $dec / 100 > 0 && $j <= count($result)) {
                                $lastKey = count($result) - $j;
                                $lastOne = number_format($result[$lastKey] - $dec / 100, 2, '.', '');
                                if (substr($amount, strlen($amount) - 1, 1) != $thunder && substr($lastOne, strlen($lastOne) - 1, 1) != $thunder) {
                                    $result[$lastKey] = $lastOne;
                                    break 2;
                                } else {
                                    $dec++;
                                }
                                $j++;
                            }
                        } else {
                            $amount = number_format($leftAmount - $dec / 100, 2, '.', '');
                            $lastOne = number_format($result[count($result) - 1] + $dec / 100, 2, '.', '');
                            if (substr($amount, strlen($amount) - 1, 1) != $thunder && substr($lastOne, strlen($lastOne) - 1, 1) != $thunder) {
                                $result[count($result) - 1] = $lastOne;
                                break;
                            } else {
                                $dec++;
                            }
                        }
                    }
                }
            } else {
                $tail = get_tail($thunder);
                $max = min($maxAmount, $leftAmount - ($leftCount - 1) * $minAmount * 2); // 红包最大金额不能超过剩余金额和最大金额的较小值
                $min = max($minAmount, $leftAmount - ($leftCount - 1) * $maxAmount); // 红包最小金额不能低于剩余金额和最小金额的较大值
                if ($max < $min) {
                    $tmp = $max;
                    $max = $min;
                    $min = $tmp;
                }
                $amount = get_random_amount($min, $max, 1);
                $amount = number_format($amount, 1, '.', '') . $tail;
                if ($noStraight && straight_check($amount)) {
                    while (true) {
                        $amount = get_random_amount($min, $max, 1);
                        $amount = number_format($amount, 1, '.', '') . $tail;
                        if (!straight_check($amount)) {
                            break;
                        }
                    }
                }
                if ($noLeopard && leopard_check($amount)) {
                    while (true) {
                        $amount = get_random_amount($min, $max, 1);
                        $amount = number_format($amount, 1, '.', '') . $tail;
                        if (!leopard_check($amount)) {
                            break;
                        }
                    }
                }
            }
            $result[] = abs($amount);
            if ($leftCount > 1) {
                $leftAmount -= $amount;
                $leftCount--;
            }
        }
        return $result;
    }
}

if (!function_exists('get_tail')) {
    function get_tail($thunder)
    {
        $numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $filteredNumbers = [];
        foreach ($numbers as $number) {
            if ($number != $thunder) {
                $filteredNumbers[] = $number;
            }
        }
        return $filteredNumbers[array_rand($filteredNumbers)];
    }
}

if (!function_exists('get_random_amount')) {
    function get_random_amount($minAmount, $maxAmount, $decimal = 2)
    {
        $amount = $minAmount;
        while (true) {
            $amount = round(mt_rand($minAmount * 10, $maxAmount * 10) / 10, $decimal); // 保留两位小数
            if ($amount > 0) {
                break;
            }
        }
        return $amount;
    }
}


if (!function_exists('leopard_check')) { //豹子判断
    function leopard_check($amount): bool
    {
        $amount = number_format($amount, 2, '.', '');
        $number = str_replace('.', '', $amount);
        // 判断组成的每个数字是否相同
        $digits = str_split($number);
        if (count($digits) < 3) {
            return false;
        }
        $firstDigit = $digits[0];
        foreach ($digits as $digit) {
            if ($digit !== $firstDigit) {
                return false;
            }
        }

        return true;
    }
}
if (!function_exists('amount_count')) {
    function amount_count($amount)
    {
        $amount = number_format($amount, 2, '.', '');
        $number = str_replace('.', '', $amount);
        return strlen($number);
    }
}

if (!function_exists('straight_check')) { //顺子判断
    function straight_check($amount): bool
    {
        if ($amount < 1) {
            return false;
        }
        $numberString = str_replace('.', '', $amount);
        if (strlen($numberString) < 3) {
            return false;
        }
        for ($i = 1; $i < strlen($numberString); $i++) {
            if ($numberString[$i] != ($numberString[$i - 1] + 1)) {
                return false;
            }
        }
        return true;
    }
}
if (!function_exists('check_thunder_num')) {
    function check_thunder_num($list, $thunder)
    {
        $thunderNum = 0;
        foreach ($list as $val) {
            $lastNum = substr($val, strlen($val) - 1, 1);
            if ($thunder == $lastNum) {
                $thunderNum++;
            }
        }
        return $thunderNum;
    }
}

if (!function_exists('format_name')) {
    function format_name($str, $maxLen = 8)
    {
        if (strlen($str) > $maxLen) {
            $str = mb_substr($str, 0, $maxLen - 3) . '..';
        }
        return $str;
    }
}

if (!function_exists('format_float')) {
    function format_float($str)
    {
        return str_replace(".", "\.", $str);
    }
}

if (!function_exists('add_log')) {
    function add_log($msg, $type = '日志', $filename = 'local_log')
    {
        $handler = new \Monolog\Handler\RotatingFileHandler(storage_path('logs/' . $filename . '.log'));
        $handler->setFormatter(new LogJsonFormatter());
        (new \Monolog\Logger($type))
            ->pushHandler($handler)
            ->info($msg);
    }
}

if (!function_exists('common_reply_markup')) {
    function common_reply_markup($chatId, $InlineKeyboardMarkup = null)
    {
        $key = 'group_' . $chatId;
        $groupInfo = Redis::get($key);
        if (!$groupInfo) {
            $groupInfo = GroupManagement::query()->where('status', 1)->where('group_id', $chatId)->first();
            if ($groupInfo) {
                $groupInfo = $groupInfo->toArray();
            } else {
                return [];
            }
            Redis::setex($key, 60, serialize($groupInfo));
        } else {
            $groupInfo = unserialize($groupInfo);
        }

        if ($InlineKeyboardMarkup) {
            $markUps = $InlineKeyboardMarkup->addRow(
                InlineKeyboardButton::make(trans('telegram.btn_service'), url: $groupInfo['service_url']),
                InlineKeyboardButton::make(trans('telegram.btn_recharge'), url: $groupInfo['recharge_url']),
                InlineKeyboardButton::make(trans('telegram.btn_rule'), url: $groupInfo['channel_url']),
                InlineKeyboardButton::make(trans('telegram.btn_balance'), callback_data: 'balance'),
            )->addRow(
                InlineKeyboardButton::make(trans('telegram.btn_invitelink'), callback_data: "invitelink"),
                InlineKeyboardButton::make(trans('telegram.btn_promotion'), callback_data: 'share_data'),
            )->addRow(
                InlineKeyboardButton::make(trans('telegram.btn_report'), callback_data: "today_data"),
                InlineKeyboardButton::make(trans('telegram.yesterday_report'), callback_data: 'yesterday_data'),
                InlineKeyboardButton::make(trans('telegram.team_report'), callback_data: 'team_report'),
            );
        } else {
            $markUps =  InlineKeyboardMarkup::make()->addRow(
                InlineKeyboardButton::make(trans('telegram.btn_service'), url: $groupInfo['service_url']),
                InlineKeyboardButton::make(trans('telegram.btn_recharge'), url: $groupInfo['recharge_url']),
                InlineKeyboardButton::make(trans('telegram.btn_rule'), url: $groupInfo['channel_url']),
                InlineKeyboardButton::make(trans('telegram.btn_balance'), callback_data: 'balance'),
            )->addRow(
                InlineKeyboardButton::make(trans('telegram.btn_invitelink'), callback_data: "invitelink"),
                InlineKeyboardButton::make(trans('telegram.btn_promotion'), callback_data: 'share_data'),
            )->addRow(
                InlineKeyboardButton::make(trans('telegram.btn_report'), callback_data: "today_data"),
                InlineKeyboardButton::make(trans('telegram.yesterday_report'), callback_data: 'yesterday_data'),
                InlineKeyboardButton::make(trans('telegram.team_report'), callback_data: 'team_report'),
            );
        }
        $common_reply_markup = config('reply_markup.common_reply_markup');
        if ($common_reply_markup) {
            foreach ($common_reply_markup as $line) {
                $buttons = [];
                foreach ($line as $row) {
                    $buttons[] = InlineKeyboardButton::make($row['text'], $row['url'], null, $row['callback_data']);
                }
                $markUps->addRow(...$buttons);
            }
        }


        return $markUps;
    }
}

if (!function_exists('del_lucklist')) {
    function del_lucklist($luckyId)
    {
        $luckyKey = 'lucky_' . $luckyId;
        Redis::del($luckyKey);
        $historyListKey = 'history_list_' . $luckyId;
        Redis::del($historyListKey);
    }
}

if (!function_exists('get_photo')) {
    function get_photo($groupId)
    {
        $key = 'photo_' . $groupId;
        $photoId = Redis::get($key);
        if (!$photoId) {
            $groupInfo = GroupManagement::query()->where('status', 1)->where('group_id', $groupId)->first();
            $photoId = $groupInfo['photo_id'];
            Redis::setex($key, 60, $photoId);
        }

        return $photoId;
    }
}

if (!function_exists('money_log')) {
    function money_log($groupId, $tgId, $amount, $type, $remark = '', $lucky_id = null)
    {
        if ($amount == 0) {
            return false;
        }
        $balance = UserManagement::query()->where('group_id', $groupId)->where('tg_id', $tgId)->value('balance');
        $insert = [
            'amount' => $amount,
            'tg_id' => $tgId,
            'group_id' => $groupId,
            'type' => $type,
            'remark' => $remark,
            'lucky_id' => $lucky_id,
            'balance' => $balance,
        ];
        return MoneyLog::query()->create($insert);
    }
}

if (!function_exists('get_startenddate_by_option')) {
    function get_startenddate_by_option($option = null)
    {
        switch ($option) {
            case '365':
                $start_date = Carbon::now()->subDays(365);
                $end_date = Carbon::now();
                // 直线
                break;
            case '180':
                $start_date = Carbon::now()->subDays(180);
                $end_date = Carbon::now();
                // 直线
                break;
            case '30':
                $start_date = Carbon::now()->subDays(30);
                $end_date = Carbon::now();
                // 直线
                break;
            case '15':

                $start_date = Carbon::now()->subDays(15);
                $end_date = Carbon::now();
                // 直线
                break;
            case '7':
                $start_date = Carbon::now()->subDays(7);
                $end_date = Carbon::now();
                break;
            case '1':
            default:
                $start_date = Carbon::now()->startOfDay();
                $end_date = Carbon::now();
        }

        return [
            'start_date' => Carbon::parse($start_date),
            'end_date' => Carbon::parse($end_date)
        ];
    }
}
