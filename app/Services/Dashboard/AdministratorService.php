<?php

namespace App\Services\Dashboard;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;

class AdministratorService
{
    public function showData($request)
    {
        try {
            DB::beginTransaction();

            $data = [
                'administrator' => User::with('roles')->when($request->term, function ($query, $term) {
                    $query->where('name', 'LIKE', '%' . $term . '%');
                })->orderBy('name', 'asc')->paginate($request->show)->withQueryString(),
                'roles' => Role::where('status', 1)->get(),
                'filters' => $request->only(['term', 'show']),
                'response' => Session::get('response'),
            ];

            DB::commit();

            return $data;
        } catch (\Exception $e) {
            DB::rollBack();
            // Handle exception (e.g., log it, return a response, etc.)
            return response()->json(['error' => 'An error occurred while fetching data.'], 500);
        }
    }

    public function storeData($request)
    {

        try {
            DB::beginTransaction();

            $request->validated();
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'tg_id' => $request->tg_id,
                'status' => $request->status,
            ]);
            $user->assignRole($request->role);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // Handle exception (e.g., log it, return a response, etc.)
            return response()->json(['error' => 'An error occurred while storing data.'], 500);
        }
    }

    public function updateData($request)
    {
        try {
            DB::beginTransaction();

            if ($request->update_type == 'all') {
                $request->validated();


                // Extracting request data
                $updateData = $request->only(['name', 'email', 'tg_id', 'status']);

                // Updating password if provided
                if ($request->filled('password')) {
                    $updateData['password'] = Hash::make($request->password);
                }

                // Updating user
                $user = User::findOrFail($request->id);
                $user->update($updateData);
                $user_role = User::find($request->input('id'));
                $user_role->syncRoles([]);
                $user_role->assignRole($request->role);
            } else {
                User::find($request->input('id'))->update([
                    'status' => ($request->status == 1) ? 0 : 1,
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // Handle exception (e.g., log it, return a response, etc.)
            return response()->json(['error' => 'An error occurred while updating data.'], 500);
        }
    }

    public function deleteData($request)
    {
        try {
            DB::beginTransaction();

            User::find($request->input('id'))->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // Handle exception (e.g., log it, return a response, etc.)
            return response()->json(['error' => 'An error occurred while deleting data.'], 500);
        }
    }
}
