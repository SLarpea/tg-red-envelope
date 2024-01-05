<?php

namespace App\Models;

use App\Traits\DateTrait;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupManagement extends Model
{
    use DateTrait, LogsActivity, SoftDeletes;

    protected $table = 'group_management';

    protected $guarded = [];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
         -> logOnly(['group_id', 'name','remark','status','service_url','recharge_url','channel_url','photo_id','admin_id'])
         -> logOnlyDirty()
         -> dontSubmitEmptyLogs();
    }

    public function tapActivity(Activity $activity, string $eventName)
    {
        $activity->properties = $activity->properties->put('agent', [
            'ip' => request()->ip(),
            'host' => gethostname(),
        ]);
    }

    public function adminuser()
    {
        return $this->hasOne(User::class, 'id', 'admin_id');
    }
}
