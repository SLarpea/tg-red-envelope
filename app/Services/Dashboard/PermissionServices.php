<?php

namespace App\Services\Dashboard;

use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;

class PermissionServices
{
    public function showData($request)
    {
        return [
            'permissions' => Permission::when($request->term, function ($query, $term) {
                $query->where('name', 'LIKE', '%' . $term . '%');
            })->orderBy('id', 'asc')->paginate($request->show)->withQueryString(),
            'filters' => $request->only(['term', 'show']),
            'response' => Session::get('response'),
        ];
    }

    public function storeData($request)
    {
        $request->validated();
        Permission::create([
            'name' => $request->name,
            'status' => $request->status,
        ]);
    }

    public function updateData($request)
    {
        if($request->update_type == 'all'){
            $request->validated();
            Permission::find($request->input('id'))->update([
                'name' => $request->name,
                'status' => $request->status,
            ]);
        }else{
            Permission::find($request->input('id'))->update([
                'status' => ($request->status == 1) ? 0 : 1,
            ]);
        }
    }

    public function deleteData($request)
    {
        Permission::find($request->input('id'))->delete();
    }
}
