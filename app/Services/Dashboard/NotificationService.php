<?php

namespace App\Services\Dashboard;

use Exception;
use App\Models\Notification;
use App\Events\PusherBroadcast;
use App\Models\CommissionRecord;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class NotificationService
{
    public function showData($request)
    {
        try {
            DB::beginTransaction();

            $notifications = Notification::when($request->term, function ($query, $term) {
                $query->where('title', 'LIKE', "%$term%")->orWhere('message', 'LIKE', "%$term%");
            });

            if ($request->id && $request->id != 'all') {
                $notifications = $notifications->orderByRaw("id = $request->id DESC");
            }

            $notifications = $notifications->orderByRaw("is_read ASC, updated_at DESC")->paginate($request->show)->withQueryString();
            $data = [
                'notifications' => $notifications,
                'filters' => $request->only(['term', 'show', 'id']),
                'response' => Session::get('response'),
            ];

            // if (empty($request->id)) {
            //     self::markAsRead('all');
            // }

            DB::commit();
            return $data;
        } catch (\Exception $e) {
            DB::rollBack();
            // Handle exception (e.g., log it, return a response, etc.)
            dd($e->getMessage());
            return response()->json(['error' => 'An error occurred while fetching data.'], 500);
        }
    }

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
