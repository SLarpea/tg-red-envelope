<?php

namespace App\Services\Dashboard;

use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class RoleService
{
    public function showData($request)
    {
        return [
            'roles' => Role::when($request->term, function ($query, $term) {
                $query->where('name', 'LIKE', '%' . $term . '%');
            })->orderBy('id', 'asc')->paginate($request->show)->withQueryString(),
            'filters' => $request->only(['term', 'show']),
            'response' => Session::get('response'),
        ];
    }

    public function storeData($request)
    {
        $request->validated();
        Role::create([
            'name' => $request->name,
            'status' => $request->status,
        ]);
    }

    public function updateData($request)
    {
        if($request->update_type == 'all'){
            $request->validated();
            Role::find($request->input('id'))->update([
                'name' => $request->name,
                'status' => $request->status,
            ]);
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
