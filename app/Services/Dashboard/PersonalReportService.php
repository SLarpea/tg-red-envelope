<?php

namespace App\Services\Dashboard;

use Carbon\Carbon;
use App\Models\MoneyLog;
use App\Models\LuckyMoney;
use App\Models\ShareRecord;
use App\Models\InviteRecord;
use App\Models\LuckyHistory;
use App\Models\RewardRecord;
use App\Models\JackpotRecord;
use App\Models\RechargeRecord;
use App\Models\WithdrawRecord;
use App\Models\CommissionRecord;
use Illuminate\Support\Facades\Session;

class PersonalReportService
{
    public function showData()
    {
        $data = [
            'luck_num' => $this->getLuckNum(),
            'luck_num_thunder' => $this->getLuckNumThunder(),
            'lucky_history' => $this->getLuckyHistory(),
            'lucky_history_thunder' => $this->getLuckyHistoryThunder(),
            'lucky_amount' => $this->getLuckyAmount(),
            'lucky_thunder_amount' => $this->getLuckyThunderAmount(),
            'lucky_history_amount' => $this->getLuckyHistoryAmount(),
            'lucky_history_thunder_amount' => $this->getLuckyHistoryThunderAmount(),
            'invite_amount' => $this->getInviteAmount(),
            'reward_amount' => $this->getRewardAmount(),
            'share_amount' => $this->getShareAmount(),
            'recharge_amount' => $this->getRechargeAmount(),
            'withdraw_amount' => $this->getWithdrawAmount(),
            'commission_amount' => $this->getCommissionAmount(),
            'to_share_amount' => $this->getToShareAmount(),
            'jackpot_amount' => $this->getJackpotAmount(),
            'profit_amount' => $this->getProfitAmount(),
        ];
        return $data;
    }

    /**
     * Luck Num Count
     */
    private function getLuckNum()
    {
        $request = request()->all();

        $dates = get_startenddate_by_option(Session::get('luck_num'));

        return  LuckyMoney::filterByDateCreated($dates['start_date'], $dates['end_date'])
            ->where('sender_id', $request['tg_id'])
            ->count();
    }

    private function getLuckNumThunder()
    {
        $request = request()->all();
        $dates = get_startenddate_by_option(Session::get('luck_num_thunder'));

        return LuckyHistory::filterByDateCreated($dates['start_date'], $dates['end_date'], 'lucky_history')
            ->leftJoin('lucky_money', 'lucky_money.id', '=', 'lucky_history.lucky_id')
            ->where('lucky_money.sender_id', $request['tg_id'])
            ->where('lucky_history.is_thunder', 1)
            ->count();
    }

    // Other methods and properties...

    private function getLuckyHistory()
    {
        $request = request()->all();
        $dates = get_startenddate_by_option(Session::get('lucky_history'));

        return LuckyHistory::filterByDateCreated($dates['start_date'], $dates['end_date'])
            ->where('user_id', $request['tg_id'])
            ->count();
    }

    private function getLuckyHistoryThunder()
    {
        $request = request()->all();
        $dates = get_startenddate_by_option(Session::get('lucky_history_thunder'));

        return LuckyHistory::filterByDateCreated($dates['start_date'], $dates['end_date'])
            ->where('user_id', $request['tg_id'])
            ->where('is_thunder', 1)
            ->count();
    }

    private function getLuckyAmount()
    {
        $request = request()->all();
        $dates = get_startenddate_by_option(Session::get('lucky_amount'));

        return LuckyMoney::filterByDateCreated($dates['start_date'], $dates['end_date'])
            ->where('sender_id', $request['tg_id'])
            ->sum('received');
    }

    private function getLuckyThunderAmount()
    {
        $request = request()->all();
        $dates = get_startenddate_by_option(Session::get('lucky_thunder_amount'));

        return LuckyHistory::filterByDateCreated($dates['start_date'], $dates['end_date'], 'lucky_history')
            ->leftJoin('lucky_money', 'lucky_money.id', '=', 'lucky_history.lucky_id')
            ->where('lucky_money.sender_id', $request['tg_id'])
            ->where('lucky_history.is_thunder', 1)
            ->sum('lucky_history.lose_money');
    }

    private function getLuckyHistoryAmount()
    {
        $request = request()->all();
        $dates = get_startenddate_by_option(Session::get('lucky_history_amount'));

        return LuckyHistory::filterByDateCreated($dates['start_date'], $dates['end_date'])
            ->where('user_id', $request['tg_id'])
            ->sum('amount');
    }

    private function getLuckyHistoryThunderAmount()
    {
        $request = request()->all();
        $dates = get_startenddate_by_option(Session::get('lucky_history_thunder_amount'));

        return LuckyHistory::filterByDateCreated($dates['start_date'], $dates['end_date'])
            ->where('user_id', $request['tg_id'])
            ->where('is_thunder', 1)
            ->sum('lose_money');
    }

    private function getInviteAmount()
    {
        $request = request()->all();
        $dates = get_startenddate_by_option(Session::get('invite_amount'));

        return InviteRecord::filterByDateCreated($dates['start_date'], $dates['end_date'])
            ->where('invite_user_id', $request['tg_id'])
            ->sum('amount');
    }

    private function getRewardAmount()
    {
        $request = request()->all();
        $dates = get_startenddate_by_option(Session::get('reward_amount'));

        return RewardRecord::filterByDateCreated($dates['start_date'], $dates['end_date'])
            ->where('tg_id', $request['tg_id'])
            ->sum('amount');
    }

    private function getShareAmount()
    {
        $request = request()->all();
        $dates = get_startenddate_by_option(Session::get('share_amount'));

        return ShareRecord::filterByDateCreated($dates['start_date'], $dates['end_date'])
            ->where('share_user_id', $request['tg_id'])
            ->sum('amount');
    }

    private function getRechargeAmount()
    {
        $request = request()->all();
        $dates = get_startenddate_by_option(Session::get('recharge_amount'));

        return RechargeRecord::filterByDateCreated($dates['start_date'], $dates['end_date'])
            ->where('tg_id', $request['tg_id'])
            ->sum('amount');
    }

    private function getWithdrawAmount()
    {
        $request = request()->all();
        $dates = get_startenddate_by_option(Session::get('withdraw_amount'));

        return WithdrawRecord::filterByDateCreated($dates['start_date'], $dates['end_date'])
            ->where('tg_id', $request['tg_id'])
            ->sum('amount');
    }

    private function getCommissionAmount()
    {
        $request = request()->all();
        $dates = get_startenddate_by_option(Session::get('commission_amount'));

        return CommissionRecord::filterByDateCreated($dates['start_date'], $dates['end_date'])
            ->where('sender_id', $request['tg_id'])
            ->sum('amount');
    }

    private function getToShareAmount()
    {
        $request = request()->all();
        $dates = get_startenddate_by_option(Session::get('to_share_amount'));

        return ShareRecord::filterByDateCreated($dates['start_date'], $dates['end_date'])
            ->where('tg_id', $request['tg_id'])
            ->sum('amount');
    }

    private function getJackpotAmount()
    {
        $request = request()->all();
        $dates = get_startenddate_by_option(Session::get('jackpot_amount'));

        return JackpotRecord::filterByDateCreated($dates['start_date'], $dates['end_date'])
            ->where('sender_id', $request['tg_id'])
            ->sum('amount');
    }

    private function getProfitAmount()
    {
        $request = request()->all();
        $dates = get_startenddate_by_option(Session::get('profit_amount'));

        return MoneyLog::filterByDateCreated($dates['start_date'], $dates['end_date'])
            ->where('tg_id', $request['tg_id'])
            ->sum('amount');
    }
}
