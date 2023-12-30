<?php

namespace App\Models;

// use Dcat\Admin\Traits\HasDateTimeFormatter;

use App\Models\Traits\ScopeTraits\ScopeCommonFilterTraits;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class WithdrawRecord extends Model
{
	// use HasDateTimeFormatter;
    use SoftDeletes, ScopeCommonFilterTraits;

    protected $table = 'withdraw_record';
    protected $fillable = [
        'amount',
        'tg_id',
        'group_id',
        'remark',
        'admin_id',
        'first_name',
        'username',
        'status',
        'address',
        'addr_type',
    ];
    public function adminuser()
    {
        return $this->hasOne(User::class,'id','admin_id');
    }
}
