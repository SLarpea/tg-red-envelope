<?php

namespace App\Models;

use App\Traits\DateTrait;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use DateTrait;
    protected $table = 'configs';
    protected $fillable = [
        'name',
        'value',
        'group_id',
        'user_id',
        'admin_id',
        'remark',
    ];
    public function adminuser()
    {
        return $this->hasOne(User::class,'id','admin_id');
    }
}
