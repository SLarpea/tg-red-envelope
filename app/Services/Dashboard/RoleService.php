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
            'roles' => Role::when($request->term, function ($query, $term) {
                $query->where('name', 'LIKE', '%' . $term . '%');
            })->orderBy('id', 'asc')->paginate($request->show)->withQueryString(),
            'permissions' => Permission::where('status', 1)->get(),
            'filters' => $request->only(['term', 'show']),
            'response' => Session::get('response'),
        ];
    }

    public function storeData($request)
    {

        $request->validated();
        $role = Role::create([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        $role->syncPermissions($request->selectedOptions);
    }

    public function updateData($request)
    {
        dd($request);
        if($request->update_type == 'all'){
            $request->validated();
            $role = Role::find($request->input('id'))->update([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            // $role->syncPermissions($request->selectedOptions);
        }else{
            Role::find($request->input('id'))->update([
                'status' => ($request->status == 1) ? 0 : 1,
            ]);
        }
    }

    public function deleteData($request)
    {
        Role::find($request->input('id'))->delete();
    }
}
