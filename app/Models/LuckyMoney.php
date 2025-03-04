<?php

namespace App\Models;

use App\Models\Traits\ScopeTraits\ScopeCommonFilterTraits;
use App\Traits\DateTrait;
use Illuminate\Database\Eloquent\Model;

class LuckyMoney extends Model
{
    use  DateTrait, ScopeCommonFilterTraits;
    protected $table = 'lucky_money';
    protected $fillable = [
        'sender_id',
        'sender_name',
        'amount',
        'received',
        'number',
        'lucky',
        'thunder',
        'chat_id',
        'red_list',
        'lose_rate',
        'message_id',
        'type',
    ];
    public function sender()
    {
        return $this->hasOne(UserManagement::class, 'tg_id', 'sender_id');
    }

    public function scopeWithSenderId($query, $senderId)
    {
        return $query->where('sender_id', $senderId);
    }

    public function scopePendingLuckyEnvelope($query)
    {
        return $query->whereColumn('amount', '<>', 'received');
    }
}
