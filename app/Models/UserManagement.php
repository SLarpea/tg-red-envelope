<?php

namespace App\Models;

use App\Traits\DateTrait;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\ScopeTraits\ScopeCommonFilterTraits;

class UserManagement extends Model
{
    use  DateTrait, ScopeCommonFilterTraits;
    protected $table = 'user_management';
    protected $guarded = [];

    public function invite()
    {
        return $this->hasOne(self::class, 'tg_id', 'invite_user');
    }
}
