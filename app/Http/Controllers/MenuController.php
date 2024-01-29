<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:menu')->only(['index']);
        $this->middleware('permission:edit_menu')->only(['update']);
        // no permission yet for delete/store
    }

    public function index(Request $request)
    {
        $data = [
                'menus' => Menu::when($request->term, function ($query, $term) {
                    $query->where('name', 'LIKE', '%' . $term . '%');
                })->orderBy('sort', 'asc')->paginate($request->show)->withQueryString(),
                'filters' => $request->only(['term', 'show']),
                'response' => Session::get('response'),
        ];

        return Inertia::render('Menu', [
            'menus' => $data['menus'],
            'filters' => $data['filters'],
            'response' => $data['response'],
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|integer',
        ]);

        $lastSortOrder = Menu::orderBy('sort', 'desc')->value('sort');
        Menu::create([
            'name' => $request->name,
            'url' => $request->url,
            'sort' => $lastSortOrder + 1,
            'status' => $request->status,
        ]);

        return redirect()->route('menus.index')->with('response', 'success');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        if ($request->has('id')) {

            if($request->update_type == 'all'){
                $request->validate([
                    'name' => 'required|string|max:255',
                    'status' => 'required|integer',
                ]);

                Menu::find($request->input('id'))->update([
                    'name' => $request->name,
                    // 'url' => $request->url,
                    // 'sort' => $request->sort,
                    'status' => $request->status,
                ]);
            }else{
                Menu::find($request->input('id'))->update([
                    'status' => ($request->status == 1) ? 0 : 1,
                ]);
            }

            return redirect()->route('menus.index')->with('response', 'success');
        }
    }

    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            Menu::find($request->input('id'))->delete();

            return redirect()->route('menus.index')->with('response', 'success');
        }
    }

    public function sort(Request $request)
    {
        $parameters = $request->all();
        foreach ($parameters as $data) {
            Menu::find($data['id'])->update([
                'sort' => $data['order'],
            ]);
        }

        return redirect()->route('menus.index')->with('response', 'success');
    }
}
