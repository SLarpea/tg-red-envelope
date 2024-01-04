<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Config;
use Illuminate\Http\Request;
use App\Http\Requests\ConfigRequest;
use Illuminate\Support\Facades\Session;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->group_id){
            Session::put('group_id', $request->group_id);
        }

        $data = [
            'configs' => Config::when($request->term, function ($query, $term) use ($request) {
                $query->where('name', 'LIKE', '%' . $term . '%');
            })->where('group_id', Session::get('group_id'))->orderBy('id', 'asc')->paginate($request->show)->withQueryString(),
            'filters' => $request->only(['term', 'show']),
            'response' => Session::get('response'),
        ];

        return Inertia::render('Config', [
            'configs' => $data['configs'],
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
    public function store(Request $request)
    {
        //
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
    public function update(ConfigRequest $request, string $id)
    {
        if ($request->has('id')) {
            Config::find($request->input('id'))->update([
                'name' => $request->name,
                'value' => $request->value,
                'admin_id' => $request->admin_id,
                'remark' => $request->remark,
            ]);

            return redirect()->route('configs.index')->with('response', 'success');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
