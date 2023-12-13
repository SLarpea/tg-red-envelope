<?php

namespace App\Models;

// use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class MoneyLog extends Model
{
	// use HasDateTimeFormatter;
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
