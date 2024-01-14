<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Requests\AdministratorRequest;
use App\Services\Dashboard\AdministratorService;

class AdministratorController extends Controller
{
    protected $administratorService;

    public function __construct(AdministratorService $administratorService)
    {
        $this->middleware('permission:administrator');

        $this->administratorService = $administratorService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->administratorService->showData($request);
        return Inertia::render('Administrator', [
            'administrator' => $data['administrator'],
            'roles' => $data['roles'],
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
    public function store(AdministratorRequest $request)
    {
        $this->administratorService->storeData($request);
        return redirect()->route('administrator.index')->with('response', 'success');
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
    public function update(AdministratorRequest $request, string $id)
    {
        if ($request->has('id')) {
            $this->administratorService->updateData($request);
            return redirect()->route('administrator.index')->with('response', 'success');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            $this->administratorService->deleteData($request);
            return redirect()->route('administrator.index')->with('response', 'success');
        }
    }
}
