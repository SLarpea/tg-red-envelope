<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Services\Dashboard\RoleService;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->roleService->showData($request);
        return Inertia::render('Roles', [
            'roles' => $data['roles'],
            'permissions' => $data['permissions'],
            'filters' => $data['filters'],
            'response' => $data['response'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $this->roleService->storeData($request);
        return redirect()->route('roles.index')->with('response', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        if ($request->has('id')) {
            $this->roleService->updateData($request);
            return redirect()->route('roles.index')->with('response', 'success');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            $this->roleService->deleteData($request);
            return redirect()->route('roles.index')->with('response', 'success');
        }
    }
}
