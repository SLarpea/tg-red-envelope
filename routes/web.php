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
    'setLocale'
])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('post.dashboard');
    Route::get('/recharge', [App\Http\Controllers\RechargeRecordController::class, 'index'])->name('recharge');
    Route::get('/rewards', [App\Http\Controllers\RewardRecordController::class, 'index'])->name('rewards');
    Route::get('/reports', [App\Http\Controllers\ReportController::class, 'index'])->name('reports');
    Route::get('/commissions', [App\Http\Controllers\CommissionRecordController::class, 'index'])->name('commissions.index');
    Route::get('/red-envelopes', [App\Http\Controllers\RedEnvelopeManagementController::class, 'index'])->name('red-envelopes.index');
    Route::get('/withdraw', [App\Http\Controllers\WithdrawRecordController::class, 'index'])->name('withdraw');
    Route::get('/operation-log', [App\Http\Controllers\OperationLogController::class, 'index'])->name('operation-log');
    Route::get('/personal-report', [App\Http\Controllers\PersonalReportController::class, 'index'])->name('personal-report');
    Route::post('/personal-report', [App\Http\Controllers\PersonalReportController::class, 'index'])->name('post.personal-report');
    Route::get('/funding-details', [App\Http\Controllers\FundingDetailController::class, 'index'])->name('funding-details');
    Route::get('/lucky-history', [App\Http\Controllers\LuckyHistoryController::class, 'index'])->name('lucky-history');
    Route::get('/invitation-records', [App\Http\Controllers\InvitationRecordController::class, 'index'])->name('invitation-records');
    Route::get('/share-records', [App\Http\Controllers\ShareRecordController::class, 'index'])->name('share-records');
    Route::get('/winning-records', [App\Http\Controllers\WinningRecordController::class, 'index'])->name('winning-records');
    Route::resource('/administrator', App\Http\Controllers\AdministratorController::class);
    Route::resource('/roles', App\Http\Controllers\RoleController::class);
    Route::resource('/permissions', App\Http\Controllers\PermissionController::class);
    Route::resource('/groups', App\Http\Controllers\GroupManagementController::class);
    Route::resource('/configs', App\Http\Controllers\ConfigController::class);
    Route::resource('/tg-users', App\Http\Controllers\UserManagementController::class);
    Route::put('/tg-users.top-up/{id}', [App\Http\Controllers\UserManagementController::class, 'top_up'])->name('tg-users.top-up');
    Route::put('/tg-users.withdraw/{id}', [App\Http\Controllers\UserManagementController::class, 'withdraw'])->name('tg-users.withdraw');
    Route::resource('/menus', App\Http\Controllers\MenuController::class);
    Route::put('/menus.sort', [App\Http\Controllers\MenuController::class, 'sort'])->name('menus.sort');

    Route::post('/set-locale', [App\Http\Controllers\UserManagementController::class, 'setLocale'])->name('post.setlocale');
});
