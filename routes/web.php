<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/tg-users', [App\Http\Controllers\UserManagementController::class, 'index'])->name('tg-users');
    Route::get('/recharge', [App\Http\Controllers\RechargeRecordController::class, 'index'])->name('recharge');
    Route::get('/withdraw', [App\Http\Controllers\WithdrawRecordController::class, 'index'])->name('withdraw');
    Route::resource('/administrator', App\Http\Controllers\AdministratorController::class);
    Route::resource('/groups', App\Http\Controllers\GroupManagementController::class);
});
