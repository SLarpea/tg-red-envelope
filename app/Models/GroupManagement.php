<?php

namespace App\Models;

use App\Traits\DateTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupManagement extends Model
{
    use DateTrait;
    
     protected $guarded = [];
    
    protected $table = 'group_management';
    protected $fillable = [
        'group_id',
        'remark',
        'status',
        'service_url',
        'recharge_url',
        'channel_url',
        'photo_id',
        'admin_id',
    ];
    public function adminuser()
    {
        return $this->hasOne(User::class, 'id', 'admin_id');
    }
}
