<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Requests\AdministratorRequest;
use App\Services\Dashboard\AdministratorServices;

class AdministratorController extends Controller
{
    protected $administratorServices;

    public function __construct(AdministratorServices $administratorServices)
    {
        $this->administratorServices = $administratorServices;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->administratorServices->showData($request);
        return Inertia::render('Administrator', [
            'administrator' => $data['administrator'],
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
        $this->administratorServices->storeData($request);
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
            $this->administratorServices->updateData($request);
            return redirect()->route('administrator.index')->with('response', 'success');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            $this->administratorServices->deleteData($request);
            return redirect()->route('administrator.index')->with('response', 'success');
        }
    }
}
