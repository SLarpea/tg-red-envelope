<?php

namespace App\Models;

use App\Traits\DateTrait;

use App\Models\UserManagement;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\ScopeTraits\ScopeCommonFilterTraits;

class CommissionRecord extends Model
{
    use  DateTrait, ScopeCommonFilterTraits;
    protected $table = 'commission_record';
    protected $fillable = [
        'lucky_id',
        'amount',
        'profit_amount',
        'tg_id',
        'group_id',
        'remark',
        'sender_id',
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



