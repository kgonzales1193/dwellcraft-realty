<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppsController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\WidgetsController;
use App\Http\Controllers\SetLocaleController;
use App\Http\Controllers\ComponentsController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DatabaseBackupController;
use App\Http\Controllers\GeneralSettingController;
use Illuminate\Support\Facades\Auth;

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('index');
})->name('home');

// Route::group(['middleware' => ['auth', 'verified']], function () {
//     // Dashboards
//     Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard.index');
//     // Locale
//     Route::get('setlocale/{locale}', SetLocaleController::class)->name('setlocale');

//     // User
//     Route::resource('users', UserController::class);
//     // Permission
//     Route::resource('permissions', PermissionController::class)->except(['show']);
//     // Roles
//     Route::resource('roles', RoleController::class);
//     // Profiles
//     Route::resource('profiles', ProfileController::class)->only(['index', 'update'])->parameter('profiles', 'user');
//     // Env
//     Route::singleton('general-settings', GeneralSettingController::class);
//     Route::post('general-settings-logo', [GeneralSettingController::class, 'logoUpdate'])->name('general-settings.logo');

//     // Database Backup
//     Route::resource('database-backups', DatabaseBackupController::class);
//     Route::get('database-backups-download/{fileName}', [DatabaseBackupController::class, 'databaseBackupDownload'])->name('database-backups.download');
// });


Route::prefix('admin')->middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard');
    Route::get('setlocale/{locale}', SetLocaleController::class)->name('setlocale');

    // User
    Route::resource('users', UserController::class);
    // Permission
    Route::resource('permissions', PermissionController::class)->except(['show']);
    // Roles
    Route::resource('roles', RoleController::class);
    // Profiles
    Route::resource('profiles', ProfileController::class)->only(['index', 'update'])->parameter('profiles', 'user');
    // Env
    Route::singleton('general-settings', GeneralSettingController::class);
    Route::post('general-settings-logo', [GeneralSettingController::class, 'logoUpdate'])->name('general-settings.logo');

    // Database Backup
    Route::resource('database-backups', DatabaseBackupController::class);
    Route::get('database-backups-download/{fileName}', [DatabaseBackupController::class, 'databaseBackupDownload'])->name('database-backups.download');
});



/* Agent Routes */

Route::prefix('agent')->middleware(['auth', 'verified', 'role:agent'])->group(function () {
    Route::get('dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
});


/* General User Routes */
Route::prefix('user')->middleware(['auth', 'verified'])->group(function () {

    // Profiles
    Route::get('profile', [UserProfileController::class, 'GeneralUserProfile'])->name('profile');
});