<?php

namespace App\Models;

use App\Traits\DateTrait;

use Illuminate\Database\Eloquent\Model;

class UserManagement extends Model
{
    use  DateTrait;
    protected $table = 'user_managements';
    protected $fillable = [
        'username',
        'first_name',
        'tg_id',
        'balance',
        'group_id',
        'status',
        'invite_user',
    ];
    public function invite()
    {
        return $this->hasOne(self::class, 'tg_id', 'invite_user');
    }
}
