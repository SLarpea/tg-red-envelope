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

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/recharge', [App\Http\Controllers\RechargeRecordController::class, 'index'])->name('recharge');
    Route::get('/withdraw', [App\Http\Controllers\WithdrawRecordController::class, 'index'])->name('withdraw');
    Route::get('/operation-log', [App\Http\Controllers\OperationLogController::class, 'index'])->name('operation-log');
    Route::resource('/administrator', App\Http\Controllers\AdministratorController::class);
    Route::resource('/roles', App\Http\Controllers\RoleController::class);
    Route::resource('/permissions', App\Http\Controllers\PermissionController::class);
    Route::resource('/groups', App\Http\Controllers\GroupManagementController::class);
    Route::resource('/tg-users', App\Http\Controllers\UserManagementController::class);
    Route::resource('/menus', App\Http\Controllers\MenuController::class);
    Route::put('/menus.sort', [App\Http\Controllers\MenuController::class, 'sort'])->name('menus.sort');
});
