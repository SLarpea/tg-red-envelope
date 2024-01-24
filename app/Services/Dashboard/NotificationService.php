<?php

namespace App\Services\Dashboard;

use App\Models\Notification;
use App\Models\CommissionRecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class NotificationService
{
    public function store($params)
    {
        return Notification::create($params);
    }

    public static function getUnreadNotif($isList = true)
    {
        $notifications =  Notification::unread()->get();

        if ($isList !== true) {
            $notifications = $notifications->count();
        }

        return $notifications;
    }
}
