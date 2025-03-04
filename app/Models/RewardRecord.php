<?php

namespace App\Models;

use App\Models\Traits\ScopeTraits\ScopeCommonFilterTraits;
use App\Traits\DateTrait;

use Illuminate\Database\Eloquent\Model;

class RewardRecord extends Model
{
    use  DateTrait, ScopeCommonFilterTraits;
    protected $table = 'reward_record';
    protected $fillable = [
        'lucky_id',
        'amount',
        'tg_id',
        'group_id',
        'remark',
        'sender_id',
        'reward_num',
        'type',
    ];
    public function user()
    {
        return $this->hasOne(UserManagement::class,'tg_id','tg_id');
    }

    public function sender()
    {
        return $this->hasOne(UserManagement::class,'tg_id','sender_id');
    }
}



