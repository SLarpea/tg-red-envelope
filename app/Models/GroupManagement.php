<?php

namespace App\Models;

use App\Traits\DateTrait;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupManagement extends Model
{
    use DateTrait;
    use LogsActivity;

    protected $table = 'group_management';

    protected $guarded = [];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
         -> logOnly(['group_id','remark','status','service_url','recharge_url','channel_url','photo_id','admin_id'])
         -> logOnlyDirty()
         -> dontSubmitEmptyLogs();
    }

    public function adminuser()
    {
        return $this->hasOne(User::class, 'id', 'admin_id');
    }
}
