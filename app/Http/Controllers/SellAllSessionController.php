<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SellAllSessionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->year) {
            Session::put('filter_chart_by_year', $request->year);
            Session::put('current_year', $request->year);
        }
    }
}
