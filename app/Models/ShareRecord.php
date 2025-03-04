<?php

namespace App\Models;

use App\Models\Traits\ScopeTraits\ScopeCommonFilterTraits;
use App\Traits\DateTrait;

use App\Models\UserManagement;
use Illuminate\Database\Eloquent\Model;

class ShareRecord extends Model
{
    use  DateTrait, ScopeCommonFilterTraits;
    protected $table = 'share_records';
    protected $fillable = [
        'lucky_id',
        'amount',
        'profit_amount',
        'tg_id',
        'group_id',
        'remark',
        'share_user_id',
        'sender_id',
    ];
    public function user()
    {
        return $this->hasOne(UserManagement::class,'tg_id','tg_id');
    }
    public function shareuser()
    {
        return $this->hasOne(UserManagement::class,'tg_id','share_user_id');
    }
    public function sender()
    {
        return $this->hasOne(UserManagement::class,'tg_id','sender_id');
    }
}



