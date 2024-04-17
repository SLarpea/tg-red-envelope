<?php

namespace App\Services\Dashboard;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;

class RoleService
{
    public function showData($request)
    {
        try {
            DB::beginTransaction();

            $result = [
                'roles' => Role::with('permissions')->when($request->term, function ($query, $term) {
                    $query->where('name', 'LIKE', '%' . $term . '%');
                })->orderBy('id', 'asc')->paginate($request->show)->withQueryString(),
                'permissions' => Permission::where('status', 1)->get(),
                'filters' => $request->only(['term', 'show']),
                'response' => Session::get('response'),
            ];

            DB::commit();

            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            // Handle the exception (log, report, or throw)
            throw $e;
        }
    }

    public function storeData($request)
    {
        try {
            DB::beginTransaction();

            $request->validated();

            $role = Role::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);

            $role->syncPermissions($request->selectedOptions);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // Handle the exception (log, report, or throw)
            throw $e;
        }
    }

    public function updateData($request)
    {
        try {
            DB::beginTransaction();

            // Validate the request data
            $request->validated();

            // Find the role by ID
            $role = Role::find($request->input('id'));

            if ($request->update_type == 'all') {
                // Update the role with specified fields
                $role->update([
                    'name' => $request->name,
                    'status' => $request->status,
                ]);

                // Sync permissions with selected options
                $role->syncPermissions($request->selectedOptions);
            } else {
                // Toggle the status if update_type is not 'all'
                $role->update([
                    'status' => ($request->status == 1) ? 0 : 1,
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // Handle the exception (log, report, or throw)
            throw $e;
        }
    }

    public function deleteData($request)
    {
        try {
            DB::beginTransaction();

            Role::find($request->input('id'))->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // Handle the exception (log, report, or throw)
            throw $e;
        }
    }
}
