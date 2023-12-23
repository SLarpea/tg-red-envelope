<?php

namespace App\Services\Dashboard;

use App\Models\RewardRecord;
use Illuminate\Support\Facades\Session;

class RewardRecordService
{
    public function showData($request)
    {
        $query = RewardRecord::with(['sender', 'user'])->when($request->group_id, function ($query) use ($request) {
            $query->where('group_id', 'LIKE', '%' . $request->group_id . '%');
        });

        if (!empty($request->term)) {
            $query->where(function ($query) use ($request) {
                $query->orWhereHas('sender', function ($query) use ($request) {
                    $this->applyUserFilter($query, $request->term);
                })->orWhereHas('user', function ($query) use ($request) {
                    $this->applyUserFilter($query, $request->term);
                });
            });

            $query->orWhere('group_id', 'LIKE', '%' . $request->term . '%');
        }

        return [
            'reward' => $query->orderBy('id', 'asc')->paginate($request->show)->withQueryString(),
            'filters' => $request->only(['term', 'show', 'group_id']),
            'response' => Session::get('response'),
        ];
    }

    private function applyUserFilter($query, $term)
    {
        $query->where('first_name', 'LIKE', '%' . $term . '%')
            ->orWhere('username', 'LIKE', '%' . $term . '%');
    }
}
