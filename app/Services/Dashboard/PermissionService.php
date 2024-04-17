<?php

namespace App\Services\Dashboard;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;

class PermissionService
{
    public function showData($request)
    {
        try {
            DB::beginTransaction();

            $data = [
                'permissions' => Permission::when($request->term, function ($query, $term) {
                    $query->where('name', 'LIKE', '%' . $term . '%');
                })->orderBy('id', 'asc')->paginate($request->show)->withQueryString(),
                'filters' => $request->only(['term', 'show']),
                'response' => Session::get('response'),
            ];

            DB::commit();

            return $data;
        } catch (\Exception $e) {
            DB::rollBack();
            // Handle the exception (log, notify, etc.)
            return ['error' => $e->getMessage()];
        }
    }

    public function storeData($request)
    {
        try {
            DB::beginTransaction();

            $request->validated();

            Permission::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // Handle the exception (log, notify, etc.)
            return ['error' => $e->getMessage()];
        }
    }

    public function updateData($request)
    {
        try {
            DB::beginTransaction();

            if ($request->update_type == 'all') {
                $request->validated();
                Permission::find($request->input('id'))->update([
                    'name' => $request->name,
                    'status' => $request->status,
                ]);
            } else {
                Permission::find($request->input('id'))->update([
                    'status' => ($request->status == 1) ? 0 : 1,
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // Handle the exception (log, notify, etc.)
            return ['error' => $e->getMessage()];
        }
    }

    public function deleteData($request)
    {
        try {
            DB::beginTransaction();

            Permission::find($request->input('id'))->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // Handle the exception (log, notify, etc.)
            return ['error' => $e->getMessage()];
        }
    }
}
