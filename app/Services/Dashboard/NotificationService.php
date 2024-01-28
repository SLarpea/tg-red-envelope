<?php

namespace App\Services\Dashboard;

use Exception;
use App\Models\Notification;
use App\Events\PusherBroadcast;
use App\Models\CommissionRecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class NotificationService
{
    public function store($params)
    {
        try {
            return Notification::create($params);
        } catch (Exception $e) {
            return false;
        }
    }

    public static function getUnreadNotifications($isList = true)
    {
        try {
            $unreadNotifications = Notification::unread()->orderBy('id', 'desc');

            if ($isList) {
                $unreadNotifications = $unreadNotifications->get();
            } else {
                $unreadNotifications = $unreadNotifications->count();
            }

            return $unreadNotifications;
        } catch (Exception $e) {
            return null;
        }
    }

    public function markAsRead($id)
    {
        try {
            if (is_numeric($id)) {
                Notification::find((int)$id)->update(['is_read' => 1]);
            } elseif ($id === 'all') {
                Notification::query()->update(['is_read' => 1]);
            }

            broadcast(new PusherBroadcast('telegram', ['notif_count' => self::getUnreadNotifications(false), 'read_id' => (int)$id]))->toOthers();
        } catch (Exception $e) {
            return false;
        }
    }
}
