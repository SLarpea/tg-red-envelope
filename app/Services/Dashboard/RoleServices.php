<?php

namespace App\Services\Dashboard;

use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class RoleServices
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
}
