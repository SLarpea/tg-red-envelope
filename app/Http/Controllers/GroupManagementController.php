<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\GroupManagement;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\GroupManagementRequest;
use App\Services\Dashboard\GroupManagementServices;

class GroupManagementController extends Controller
{
    protected $groupManagementServices;

    public function __construct(GroupManagementServices $groupManagementServices)
    {
        $this->groupManagementServices = $groupManagementServices;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->groupManagementServices->showData($request);
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
        $this->groupManagementServices->storeData($request);
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
    public function update(GroupManagementRequest $request, $id)
    {
        if ($request->has('id')) {
            $this->groupManagementServices->updateData($request);
            return redirect()->route('groups.index')->with('response', 'success');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            $this->groupManagementServices->deleteData($request);
            return redirect()->route('groups.index')->with('response', 'success');
        }
    }
}
