<?php

namespace App\Services;

use App\Models\GroupManagement;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class GroupManagementServices
{
    public function showData($request)
    {
        return [
            'groups' => GroupManagement::when($request->term, function ($query, $term) {
                $query->where('group_id', 'LIKE', '%' . $term . '%');
            })->orderBy('id', 'asc')->paginate($request->show)->withQueryString(),
            'filters' => $request->only(['term', 'show']),
            'response' => Session::get('response'),
        ];
    }

    public function storeData($request)
    {
        $request->validated();
        GroupManagement::create([
            'group_id' => $request->group_id,
            'remark' => $request->remark,
            'status' => $request->status,
            'service_url' => $request->service_url,
            'recharge_url' => $request->recharge_url,
            'channel_url' => $request->channel_url,
            'photo_id' => $request->photo_id,
            'admin_id' => $request->admin_id,
        ]);
    }

    public function updateData($request)
    {
        if($request->update_type == 'all'){
            $request->validated();

            GroupManagement::find($request->input('id'))->update([
                'group_id' => $request->group_id,
                'remark' => $request->remark,
                'status' => $request->status,
                'service_url' => $request->service_url,
                'recharge_url' => $request->recharge_url,
                'channel_url' => $request->channel_url,
                'photo_id' => $request->photo_id,
                'admin_id' => $request->admin_id,
            ]);
        }else{
            GroupManagement::find($request->input('id'))->update([
                'status' => ($request->status == 1) ? 0 : 1,
            ]);
        }
    }

    public function deleteData($request)
    {
        GroupManagement::find($request->input('id'))->delete();
    }
}
