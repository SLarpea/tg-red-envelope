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
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard')->middleware('permission:View Dashboard');
    Route::get('/recharge', [App\Http\Controllers\RechargeRecordController::class, 'index'])->name('recharge')->middleware('permission:View Recharge Record');
    Route::get('/rewards', [App\Http\Controllers\RewardRecordController::class, 'index'])->name('rewards')->middleware('permission:View Recharge Record');
    Route::get('/reports', [App\Http\Controllers\ReportController::class, 'index'])->name('reports')->middleware('permission:View Reports');
    Route::get('/commissions', [App\Http\Controllers\CommissionRecordController::class, 'index'])->name('commissions.index')->middleware('permission:View Platform Commission Record');
    Route::get('/red-envelopes', [App\Http\Controllers\RedEnvelopeManagementController::class, 'index'])->name('red-envelopes.index')->middleware('permission:View Red Envelope Management');
    Route::get('/withdraw', [App\Http\Controllers\WithdrawRecordController::class, 'index'])->name('withdraw')->middleware('permission:View Withdrawal Record');
    Route::get('/operation-log', [App\Http\Controllers\OperationLogController::class, 'index'])->name('operation-log')->middleware('permission:View Operation Log');
    Route::get('/personal-report', [App\Http\Controllers\PersonalReportController::class, 'index'])->name('personal-report')->middleware('permission:Can View Personal Report in User Management');
    Route::post('/personal-report', [App\Http\Controllers\PersonalReportController::class, 'index'])->name('post.personal-report')->middleware('permission:Can View Personal Report in User Management');
    Route::get('/funding-details', [App\Http\Controllers\FundingDetailController::class, 'index'])->name('funding-details')->middleware('permission:Can View Funding Details in User Management');
    Route::get('/lucky-history', [App\Http\Controllers\LuckyHistoryController::class, 'index'])->name('lucky-history')->middleware('permission:Can View Lucky History in User Management');
    Route::get('/invitation-records', [App\Http\Controllers\InvitationRecordController::class, 'index'])->name('invitation-records')->middleware('permission:View Invitation Record in User Management');
    Route::get('/share-records', [App\Http\Controllers\ShareRecordController::class, 'index'])->name('share-records')->middleware('permission:Can View Share Record in User Management');
    Route::get('/winning-records', [App\Http\Controllers\WinningRecordController::class, 'index'])->name('winning-records')->middleware('permission:Can View Winning Record in User Management');
    Route::resource('/administrator', App\Http\Controllers\AdministratorController::class)->middleware('permission:View Administrator');
    Route::resource('/roles', App\Http\Controllers\RoleController::class)->middleware('permission:View Role');
    Route::resource('/permissions', App\Http\Controllers\PermissionController::class)->middleware('permission:View Permissions');
    Route::resource('/groups', App\Http\Controllers\GroupManagementController::class)->middleware('permission:View Group Management');
    Route::resource('/configs', App\Http\Controllers\ConfigController::class)->middleware('permission:Can Configure in Group Management');
    Route::resource('/tg-users', App\Http\Controllers\UserManagementController::class)->middleware('permission:View User Management');
    Route::put('/tg-users.top-up/{id}', [App\Http\Controllers\UserManagementController::class, 'top_up'])->name('tg-users.top-up')->middleware('permission:View User Management');
    Route::put('/tg-users.withdraw/{id}', [App\Http\Controllers\UserManagementController::class, 'withdraw'])->name('tg-users.withdraw')->middleware('permission:View User Management');
    Route::resource('/menus', App\Http\Controllers\MenuController::class)->middleware('permission:View Menu');
    Route::put('/menus.sort', [App\Http\Controllers\MenuController::class, 'sort'])->name('menus.sort')->middleware('permission:View Menu');

    Route::post('/set-locale', [App\Http\Controllers\UserManagementController::class, 'setLocale'])->name('post.setlocale');

    Route::post('/set-session', function(){
        echo "session successfully set";
    })->name('post.set-session');
});
