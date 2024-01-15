<?php

namespace App\Services\Dashboard;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;

class AdministratorService
{
    public function showData($request)
    {

        $data = [
            'administrator' => User::with('roles')->when($request->term, function ($query, $term) {
                $query->where('name', 'LIKE', '%' . $term . '%');
            })->orderBy('name', 'asc')->paginate($request->show)->withQueryString(),
            'roles' => Role::where('status', 1)->get(),
            'filters' => $request->only(['term', 'show']),
            'response' => Session::get('response'),
        ];

        return $data;
    }

    public function storeData($request)
    {
        $request->validated();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
        ]);
        $user->assignRole($request->role);
    }

    public function updateData($request)
    {
        if($request->update_type == 'all'){
            $request->validated();

            $user = User::find($request->input('id'))->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => $request->status,
            ]);
            $user_role = User::find($request->input('id'));
            $user_role->syncRoles([]);
            $user_role->assignRole($request->role);
        }else{
            User::find($request->input('id'))->update([
                'status' => ($request->status == 1) ? 0 : 1,
            ]);
        }

    }

    public function deleteData($request)
    {
        User::find($request->input('id'))->delete();
    }
}
