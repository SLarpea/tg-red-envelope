<?php

namespace App\Services\Dashboard;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class AdministratorServices
{
    public function showData($request)
    {

        $data = [
            'administrator' => User::when($request->term, function ($query, $term) {
                $query->where('name', 'LIKE', '%' . $term . '%');
            })->orderBy('name', 'asc')->paginate($request->show)->withQueryString(),
            'filters' => $request->only(['term', 'show']),
            'response' => Session::get('response'),
        ];

        return $data;
    }

    public function storeData($request)
    {
        $request->validated();
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
        ]);

    }

    public function updateData($request)
    {
        if($request->update_type == 'all'){
            $request->validated();

            User::find($request->input('id'))->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => $request->status,
            ]);
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
