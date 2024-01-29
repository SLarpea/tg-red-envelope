<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Requests\PermissionRequest;
use App\Services\Dashboard\PermissionService;

class PermissionController extends Controller
{
    protected $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->middleware('permission:permissions')->only(['index']);
        // no permission yet for store/update/destroy

        $this->permissionService = $permissionService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->permissionService->showData($request);
        return Inertia::render('Permissions', [
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
    public function store(PermissionRequest $request)
    {
        $this->permissionService->storeData($request);
        return redirect()->route('permissions.index')->with('response', 'success');
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
    public function update(PermissionRequest $request, string $id)
    {
        if ($request->has('id')) {
            $this->permissionService->updateData($request);
            return redirect()->route('permissions.index')->with('response', 'success');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            $this->permissionService->deleteData($request);
            return redirect()->route('permissions.index')->with('response', 'success');
        }
    }
}
