<?php

namespace App\Services\Dashboard;

use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleService
{
    public function showData($request)
    {
        return [
            'roles' => Role::with('permissions')->when($request->term, function ($query, $term) {
                $query->where('name', 'LIKE', '%' . $term . '%');
            })->orderBy('id', 'asc')->paginate($request->show)->withQueryString(),
            'permissions' => Permission::where('status', 1)->get(),
            'filters' => $request->only(['term', 'show']),
            'response' => Session::get('response'),
        ];
    }

    public function storeData($request)
    {
        dd($request->selectedOptions);


        $request->validated();
        $role = Role::create([
            'name' => $request->name,
            'status' => $request->status,
        ]);


        $role->syncPermissions($request->selectedOptions);
    }

    public function updateData($request)
    {
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
    }

    public function deleteData($request)
    {
        Role::find($request->input('id'))->delete();
    }
}
