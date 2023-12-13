<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard', [
            'php_version' => phpversion(),
            'nginx_version' => shell_exec('nginx -v'),
            'max_upload' => ini_get('upload_max_filesize'),
            'program_version' => config('app.program_version'),
        ]);
    }
}
