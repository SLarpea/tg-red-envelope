<?php

namespace App\Models;

// use Dcat\Admin\Traits\HasDateTimeFormatter;

use App\Models\Traits\ScopeTraits\ScopeCommonFilterTraits;
use Illuminate\Database\Eloquent\Model;

class MoneyLog extends Model
{

    use ScopeCommonFilterTraits;

    protected $table = 'money_logs';
    protected $fillable = [
        'amount',
        'tg_id',
        'group_id',
        'remark',
        'type',
        'lucky_id',
        'balance',
    ];
    public function user()
    {
        return $this->hasOne(User::class,'tg_id','tg_id');
    }
}
