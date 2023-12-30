<?php

namespace App\Models;

use App\Models\Traits\ScopeTraits\ScopeCommonFilterTraits;
use App\Traits\DateTrait;

use Illuminate\Database\Eloquent\Model;

class InviteRecord extends Model
{

    use  DateTrait, ScopeCommonFilterTraits;
    protected $table = 'invite_records';
    protected $fillable = [
        'amount',
        'tg_id',
        'group_id',
        'remark',
        'invite_user_id',
    ];
    public function user()
    {
        return $this->hasOne(UserManagement::class, 'tg_id', 'tg_id');
    }
    public function inviteuser()
    {
        return $this->hasOne(UserManagement::class, 'tg_id', 'invite_user_id');
    }
}
