<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\GroupManagement;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\GroupManagementRequest;
use App\Services\Dashboard\GroupManagementService;

class GroupManagementController extends Controller
{
    protected $groupManagementService;

    public function __construct(GroupManagementService $groupManagementService)
    {
        $this->middleware('permission:group_management')->only(['index']);
        $this->middleware('permission:create_group_management')->only(['store']);
        $this->middleware('permission:edit_group_management')->only(['update']);
        $this->middleware('permission:delete_group_management')->only(['destroy']);

        $this->groupManagementService = $groupManagementService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->groupManagementService->showData($request);
        return Inertia::render('GroupManagement', [
            'groups' => $data['groups'],
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
    public function store(GroupManagementRequest $request)
    {
        $this->groupManagementService->storeData($request);
        return redirect()->route('groups.index')->with('response', 'success');
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
    public function update(GroupManagementRequest $request, string $id)
    {
        if ($request->has('id')) {
            $this->groupManagementService->updateData($request);
            return redirect()->route('groups.index')->with('response', 'success');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            $this->groupManagementService->deleteData($request);
            return redirect()->route('groups.index')->with('response', 'success');
        }
    }
}
