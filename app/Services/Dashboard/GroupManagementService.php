<?php

namespace App\Services\Dashboard;

use App\Models\Config;
use App\Models\GroupManagement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class GroupManagementService
{
    public function showData($request)
    {
        $adminId = Auth::user()->tg_id;
        return [
            'groups' => GroupManagement::when($request->term, function ($query, $term) {
                $query->where('group_id', 'LIKE', '%' . $term . '%')
                      ->orWhere('name', 'LIKE', '%' . $term . '%')
                      ->orWhere('remark', 'LIKE', '%' . $term . '%');
            })->where('admin_id', $adminId)->orderBy('id', 'asc')->paginate($request->show)->withQueryString(),
            'filters' => $request->only(['term', 'show']),
            'response' => Session::get('response'),
        ];
    }

    public function storeData($request)
    {
        DB::beginTransaction();
        try {
            $request->validated();
            GroupManagement::create([
                'group_id' => $request->group_id,
                'name' => $request->name,
                'remark' => $request->remark,
                'status' => $request->status,
                'service_url' => $request->service_url,
                'recharge_url' => $request->recharge_url,
                'channel_url' => $request->channel_url,
                'photo_id' => $request->photo_id,
                'admin_id' => $request->admin_id,
            ]);

            $tgbotConfig = config('tgbot');
            foreach ($tgbotConfig as $key => $val) {
                if (Config::query()->where('name', $key)->where('group_id', $request->group_id)->count() == 0) {
                    $insert = [
                        'name' => $key,
                        'value' => $val,
                        'group_id' => $request->group_id,
                        'admin_id' => 1,
                        'remark' => trans('admin.tgbot.' . $key),
                    ];
                    Config::create($insert);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function updateData($request)
    {
        DB::beginTransaction();
        try {
            if ($request->update_type == 'all') {
                $request->validated();

                $groupmanagement = GroupManagement::find($request->input('id'));

                $groupIdToUpdate = $groupmanagement->group_id;

                if ($groupmanagement) {
                    $gupdate = $groupmanagement->update([
                        'name' => $request->name,
                        'group_id' => $request->group_id,
                        'remark' => $request->remark,
                        'status' => $request->status,
                        'service_url' => $request->service_url,
                        'recharge_url' => $request->recharge_url,
                        'channel_url' => $request->channel_url,
                        'photo_id' => $request->photo_id,
                        'admin_id' => $request->admin_id,
                    ]);

                    if ($gupdate) {
                        Config::where('group_id', $groupIdToUpdate)->update([
                            'group_id' => $request->group_id
                        ]);
                    }
                } else {
                    // Handle not finding GroupManagement with the specified ID
                }
            } else {
                GroupManagement::find($request->input('id'))->update([
                    'status' => ($request->status == 1) ? 0 : 1,
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function deleteData($request)
    {
        GroupManagement::find($request->input('id'))->delete();
    }

    public function getGroupIds()
    {
        return GroupManagement::get('group_id');
    }
}
